<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Observers\BidBuddyObserver;
use Exception;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


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
#[ObservedBy([BidBuddyObserver::class])]
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


	protected static function booted()
	{

		static::deleting(function (BidBuddy $buddy) {
			//check to see if the aauction is running auction or not
			// auction is not runned yet and can be delete
			if ($buddy->status == 1) {
				$buddy->user->bid_amount = $buddy->available_bids;
				$buddy->user->save();
			}
			BiddingQueue::where('bid_buddy_id' , $buddy->id)->delete();
		});
	}
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
