<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Auction
 * 
 * @property int $id
 * @property int $current_price
 * @property int $current_winner_id
 * @property int|null $no_jumper_limit
 * @property Carbon $timer
 * @property int $min_price
 * @property int $status
 * @property int $final_winner_id
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
class Auction extends Model
{
	use HasFactory;
	protected $table = 'auctions';

	protected $casts = [
		'current_price' => 'int',
		'current_winner_id' => 'int',
		'no_jumper_limit' => 'int',
		'timer' => 'datetime',
		'min_price' => 'int',
		'status' => 'int',
		'final_winner_id' => 'int',
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
		'product_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'final_winner_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function bid_buddies()
	{
		return $this->hasMany(BidBuddy::class);
	}

	public function bidding_histories()
	{
		return $this->hasMany(BiddingHistory::class);
	}

	public function bidding_queues()
	{
		return $this->hasMany(BiddingQueue::class);
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
}
