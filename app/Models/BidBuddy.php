<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class BidBuddy
 * 
 * @property int $id
 * @property int $user_id
 * @property int $auction_id
 * @property int $available_bids
 * @property int $status
 * @property Carbon $created_at
 * 
 * @property Auction $auction
 * @property User $user
 * @property Collection|BiddingQueue[] $bidding_queues
 *
 * @package App\Models
 */
class BidBuddy extends Model
{
use HasFactory;
	protected $table = 'bid_buddies';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int',
		'available_bids' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'auction_id',
		'available_bids',
		'status'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function bidding_queues()
	{
		return $this->hasMany(BiddingQueue::class);
	}
}
