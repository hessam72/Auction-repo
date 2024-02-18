<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Monolog\Handler\FormattableHandlerTrait;


/**
 * Class HighestBidder
 * 
 * @property int $id
 * @property int $user_id
 * @property int $time_spent
 * @property int $current_level_id
 * @property int $multiplier
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property HighestBidderLevel $highest_bidder_level
 * @property User $user
 *
 * @package App\Models
 */

class HighestBidder extends Model
{
	use HasFactory;
	protected $table = 'highest_bidders';



	protected $casts = [
		'user_id' => 'int',
		'time_spent' => 'int',
		'current_level_id' => 'int',
		'multiplier' => 'int'
	];

	protected $fillable = [
		'user_id',
		'time_spent',
		'current_level_id',
		'multiplier'
	];

	public function highest_bidder_level()
	{
		return $this->belongsTo(HighestBidderLevel::class, 'current_level_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
