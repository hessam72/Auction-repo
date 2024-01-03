<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::latest()->get();
        $states = State::orderBy('name')->get();

        return view('admin.cities.index', compact(['cities' , 'states']));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state_id'=>'required'
            
        ]);
       
        City::create([
            'name' => $request->name,
            'state_id'=>$request->state_id
            
        ]);
        return redirect()->back()->with('success','ثبت با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
       
        $request->validate([
            'name' => 'required',
            'state_id'=>'required'
            
        ]);
        $city->name=$request->name;
        $city->state_id=$request->state_id;
        $city->save();
       
        return redirect()->back()->with('success','ویرایش با موفقیت ثبت شد');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with('success','حذف با موفقیت ثبت شد');
    }
}
