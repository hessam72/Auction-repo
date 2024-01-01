<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class BiddingQueue
 * 
 * @property int $id
 * @property int $bid_buddy_id
 * @property int $auction_id
 * @property int $status
 * @property Carbon $created_at
 * 
 * @property Auction $auction
 * @property BidBuddy $bid_buddy
 *
 * @package App\Models
 */
class BiddingQueue extends Model
{
	protected $table = 'bidding_queue';
	use HasFactory;
	public $timestamps = false;

	protected $casts = [
		'bid_buddy_id' => 'int',
		'auction_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'bid_buddy_id',
		'auction_id',
		'status'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function bid_buddy()
	{
		return $this->belongsTo(BidBuddy::class);
	}
}
