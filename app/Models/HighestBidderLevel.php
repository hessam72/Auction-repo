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
 * Class HighestBidderLevel
 * 
 * @property int $id
 * @property string|null $name
 * @property int $time_needed
 * @property int $bid_reward
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|HighestBidder[] $highest_bidders
 *
 * @package App\Models
 */
class HighestBidderLevel extends Model
{
	protected $table = 'highest_bidder_levels';
	use HasFactory;
	protected $casts = [
		'time_needed' => 'int',
		'bid_reward' => 'int'
	];

	protected $fillable = [
		'name',
		'time_needed',
		'bid_reward'
	];

	public function highest_bidders()
	{
		return $this->hasMany(HighestBidder::class, 'current_level_id');
	}
}
