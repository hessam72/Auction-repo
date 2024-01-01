<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class BiddingHistory
 * 
 * @property int $id
 * @property int $user_id
 * @property int $auction_id
 * @property int $bid_price
 * @property Carbon $created_at
 * 
 * @property Auction $auction
 * @property User $user
 *
 * @package App\Models
 */
class BiddingHistory extends Model
{

	use HasFactory;
	protected $table = 'bidding_history';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int',
		'bid_price' => 'int'
	];

	protected $fillable = [
		'user_id',
		'auction_id',
		'bid_price'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
