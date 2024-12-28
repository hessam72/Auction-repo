<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Auction;
use App\Models\BiddingHistory;
use App\Models\Notification;
use App\Models\Product;
use App\Models\TrackVisit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Winner;
use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Upload;
    public function index()
    {

        $last_24hrs = Carbon::now()->subDay();
        $last_month = Carbon::now()->subMonth();
        $last_year = Carbon::now()->subYear();


        // last_month_income  
        $last_month_income = Transaction::where('status', 100)->where('created_at', '>', $last_month)->sum('amount');


        //past year monthly income and singups
        $past_year_monthly_income = []; // arrange by month in an array
        $past_year_monthly_singups = [];
        $past_year_monthly_auctions = [];
        $past_year_monthly_products = [];
        $past_year_monthly_packages_salses = [];
        $past_year_monthly_products_salses = [];
        $past_year_monthly_visits = [];


        for ($i = 1; $i <= 12; $i++) {
            $past_year_monthly_income[] = Transaction::where('status', 100)->whereMonth('created_at', $i)->sum('amount');
            $past_year_monthly_packages_salses[] = Transaction::where('status', 100)->where('item_type', 1)->whereMonth('created_at', $i)->sum('amount');
            $past_year_monthly_products_salses[] = Transaction::where('status', 100)->where('item_type', 2)->whereMonth('created_at', $i)->sum('amount');




            $past_year_monthly_visits[] = TrackVisit::whereMonth('created_at', $i)->count();
            $past_year_monthly_singups[] = User::whereMonth('created_at', $i)->count();
            $past_year_monthly_auctions[] = Auction::whereMonth('created_at', $i)->count();
            $past_year_monthly_products[] = Product::whereMonth('created_at', $i)->count();
        }

        // convert to string to inject to in blade
        $past_year_monthly_income = (implode(',', $past_year_monthly_income));
        $past_year_monthly_singups = (implode(',', $past_year_monthly_singups));
        $past_year_monthly_auctions = (implode(',', $past_year_monthly_auctions));
        $past_year_monthly_products = (implode(',', $past_year_monthly_products));
        $past_year_monthly_packages_salses = (implode(',', $past_year_monthly_packages_salses));
        $past_year_monthly_products_salses = (implode(',', $past_year_monthly_products_salses));
        $past_year_monthly_visits = (implode(',', $past_year_monthly_visits));


        // last 40 visits
        $latest_visits = TrackVisit::take(40)->latest()->get();




        //total visits 
        $total_visits = TrackVisit::count();

        //past month visits all and uniqe
        $past_month_all_visits = TrackVisit::where('created_at', '>', $last_month)->count();
        $past_day_visits = TrackVisit::where('created_at', '>', $last_24hrs)->count();
        $past_month_uniqe_visits = TrackVisit::where('created_at', '>', $last_month)->distinct('ip')->count();






        $packages_total_sales = Transaction::where('item_type', 1)->sum('amount');
        $products_total_sales = Transaction::where('item_type', 2)->sum('amount');



        // yearly income 
        $yearly_income = Transaction::where('status', 100)->where('created_at', '>', $last_year)->sum('amount');

        // total income 
        $total_income = Transaction::where('status', 100)->sum('amount');

        // new monthly singups 
        $new_singups = User::where('created_at', '>', $last_month)->count();
        $total_users = User::count();


        //bids placed dayily monthly yearly
        $daily_bids = BiddingHistory::where('created_at', '>', $last_24hrs)->count();
        $monthly_bids = BiddingHistory::where('created_at', '>', $last_month)->count();
        $yearly_bids = BiddingHistory::where('created_at', '>', $last_year)->count();

        //monthly winners + all time winners
        $monthly_winners = Winner::where('created_at', '>', $last_month)->count();
        $all_winners = Winner::count();


        // new products this month
        $monthly_products = Product::where('created_at', '>', $last_month)->count();

        //all products
        $all_products = Product::count();

        // new auctions this month
        $monthly_auctions = Auction::where('created_at', '>', $last_month)->count();
        $live_auctions = Auction::where('status', 100)->count();
        $all_auctions = Auction::count();




        return view('admin.dashboard', compact(
            'last_month_income',
            'yearly_income',
            'total_income',
            'new_singups',
            'daily_bids',
            'monthly_bids',
            'yearly_bids',
            'monthly_winners',
            'all_winners',
            'monthly_products',
            'all_products',
            'monthly_auctions',
            'live_auctions',
            'total_users',
            'all_auctions',
            'packages_total_sales',
            'products_total_sales',
            'past_year_monthly_auctions',
            'past_year_monthly_products',
            'past_year_monthly_income',
            'past_year_monthly_singups',
            'past_year_monthly_packages_salses',
            'past_year_monthly_products_salses',
            'past_year_monthly_visits',
            'past_month_all_visits',
            'past_month_uniqe_visits',
            'total_visits',
            'past_day_visits',
            'latest_visits'

        ));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile.edit-profile', compact('user'));
    }



    public function updatePassword(Request $request, User $user)
    {

        $request->validate([
            'currentPassword' => ['required'],
            'password' => ['required', 'confirmed'],

        ]);



        if (!Hash::check($request->currentPassword, $user->password)) {

            return back()->withErrors([
                'message' => 'لطفا پسورد قبلی خود را درست وارد کنید',

            ]);
        }



        $user->password = Hash::make($request->password);
        $user->save();


        return redirect()->back()->with('success', 'تغییر رمز عبور با موفقیت انجام شد');
    }

    public function updatePasswordIndex()
    {
        $user = auth()->user();
        return view('admin.profile.edit-password', compact('user'));
    }

   
    public function update(Request $request, User $user)
    {
        $user = auth()->user();


        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'pic' => ['file']

        ]);



        if ($request->hasFile('pic')) {
            $path = $this->UploadFile($request->file('pic'), 'images/user_profiles'); //use the method in the trait
            $user->profile_pic = $path;
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'ویرایش اطلاعات کاربری انجام شد');
    }

   
   
}
