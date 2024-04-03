<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Observers\AuctionObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Auction
 * 
 * @property int $id
 * @property int $current_price
 * @property int|null $current_winner_id
 * @property int|null $no_jumper_limit
 * @property Carbon $start_time
 * @property int $timer
 * @property int $min_price
 * @property int $status
 * @property int|null $final_winner_id
 * @property int $product_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Product $product
 * @property Collection|BidBuddy[] $bid_buddies
 * @property Collection|BiddingHistory[] $bidding_histories
 * @property Collection|BiddingQueue[] $bidding_queues
 * @property Collection|Bookmark[] $bookmarks
 * @property Collection|User[] $users
 * @property Collection|Winner[] $winners
 *
 * @package App\Models
 */
#[ObservedBy([AuctionObserver::class])]
class Auction extends Model
{
	use HasFactory;
	protected $table = 'auctions';

	protected $casts = [
		'current_price' => 'int',
		// 'current_winner_id' => 'int',
		'no_jumper_limit' => 'int',
		'timer' => 'datetime',
		'min_price' => 'int',
		'status' => 'int',
		// 'final_winner_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'current_price',
		'current_winner_id',
		'no_jumper_limit',
		'timer',
		'min_price',
		'status',
		'final_winner_id',
		'product_id',
		'start_time'
	];

	protected static function booted()
	{
		//  submit discount to the item 
		static::created(function (Auction $auction) {
		});
		static::updating(function (Auction $auction) {
			//check to see if the aauction is running auction or not
			// $auction->isRunning();
		});
		static::deleting(function (Auction $auction) {
			//check to see if the aauction is running auction or not
			// check if auction has winner with unshipedd product or not
			// $auction->isRunning();
			// $auction->hasUnshipedProduct();
		});
	}

	public function isRunning($auction)
	{
		if ($auction->start_time <= Carbon::now()) {
			// the item is live
			return false;
		} else {
			// request can proceed
		}
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'final_winner_id');
	}
	public function current_winner()
	{
		return $this->belongsTo(User::class, 'current_winner_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function bid_buddies()
	{
		return $this->hasMany(BidBuddy::class);
	}
	// bid buddy other that current winner
	public function uniqe_bid_buddies()
	{
		return $this->hasMany(BidBuddy::class)->where('user_id', '<>', $this->current_winner_id)->where('available_bids', '>', 0);
	}

	public function bidding_histories()
	{
		return $this->hasMany(BiddingHistory::class);
	}

	public function bidding_queues()
	{
		return $this->hasMany(BiddingQueue::class);
	}
	public function next_bidding_queue()
	{
		// TODO - this wont work
		// return $this->hasOne(BiddingQueue::class)->ofMany('status', 'min');
		return $this->hasOne(BiddingQueue::class)->where('status', 1)->orderBy('created_at', 'ASC');
	}


	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_auction_wins')
			->withPivot('id', 'is_paid', 'final_price')
			->withTimestamps();
	}

	public function winners()
	{
		return $this->hasMany(Winner::class);
	}
	public static function scopeSearch($query, $searchString)
	{
		return $query
			->join('products', 'auctions.product_id', '=', 'products.id')
			->where('products.title', 'like', '%' . $searchString . '%')
			->orWhere('products.short_desc', 'like', '%' . $searchString . '%')
			->orWhere('products.description', 'like', '%' . $searchString . '%');
	}
}
