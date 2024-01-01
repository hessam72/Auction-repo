<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAuctionWin
 * 
 * @property int $id
 * @property int $user_id
 * @property int $auction_id
 * @property int $is_paid
 * @property int $final_price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Auction $auction
 * @property User $user
 *
 * @package App\Models
 */
class UserAuctionWin extends Model
{
	protected $table = 'user_auction_wins';

	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int',
		'is_paid' => 'int',
		'final_price' => 'int'
	];

	protected $fillable = [
		'user_id',
		'auction_id',
		'is_paid',
		'final_price'
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
