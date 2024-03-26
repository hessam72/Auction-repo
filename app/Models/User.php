<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Shetabit\Visitor\Traits\Visitor;
/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string|null $bio
 * @property string $email
 * @property int $status
 * @property string|null $profile_pic
 * @property string $password
 * @property Carbon|null $email_verified_at
 * @property int $bid_amount
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Auction[] $auctions
 * @property Collection|BidBuddy[] $bid_buddies
 * @property Collection|BiddingHistory[] $bidding_histories
 * @property Collection|Bookmark[] $bookmarks
 * @property Collection|Comment[] $comments
 * @property Collection|HighestBidder[] $highest_bidders
 * @property Collection|Ticket[] $tickets
 * @property Collection|Transaction[] $transactions
 * @property Collection|Challenge[] $challenges
 * @property Collection|UserIp[] $user_ips
 * @property Collection|RedeemCode[] $redeem_codes
 * @property Collection|Product[] $products
 * @property Collection|Winner[] $winners
 *
 * @package App\Models
 */
class User extends  Authenticatable implements JWTSubject
{

	use Visitor;
	public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }



	use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'users';



	protected $casts = [
		'status' => 'int',
		'email_verified_at' => 'datetime',
		'bid_amount' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'birth_date',
		'bio',
		'email',
		'status',
		'profile_pic',
		'password',
		'email_verified_at',
		'bid_amount',
		'remember_token'
	];

	public function auctions()
	{
		return $this->belongsToMany(Auction::class, 'user_auction_wins')
			->withPivot('id', 'is_paid', 'final_price')
			->withTimestamps();
	}

	public function bid_buddies()
	{
		return $this->hasMany(BidBuddy::class);
	}

	public function bidding_histories()
	{
		return $this->hasMany(BiddingHistory::class);
	}

	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function highest_bidders()
	{
		return $this->hasOne(HighestBidder::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}

	public function challenges()
	{
		return $this->belongsToMany(Challenge::class, 'user_challenges')
			->withPivot('id', 'status', 'progress');
	}

	public function user_ips()
	{
		return $this->hasMany(UserIp::class);
	}

	public function redeem_codes()
	{
		return $this->belongsToMany(RedeemCode::class, 'user_redeem_codes')
			->withPivot('id');
	}

	public function user_shiped_products()
	{
		return $this->hasMany(UserShipedProduct::class);
		// return $this->belongsToMany(Product::class, 'user_shiped_products')
		// 	->withPivot('id', 'status', 'address', 'postal_code', 'state_id', 'city_id')
		// 	->withTimestamps();
	}

	public function winners()
	{
		return $this->hasMany(Winner::class);
	}
	public function city()
	{
		return $this->belongsTo(City::class);
	}
	
}
