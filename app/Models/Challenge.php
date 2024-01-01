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
 * Class Challenge
 * 
 * @property int $id
 * @property int $reward_id
 * @property string $description
 * @property int $type
 * @property int $time_type
 * @property int $category_id
 * @property int $number_to_win
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Reward $reward
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Challenge extends Model
{
	
	use HasFactory;
	protected $table = 'challenges';

	protected $casts = [
		'reward_id' => 'int',
		'type' => 'int',
		'time_type' => 'int',
		'category_id' => 'int',
		'number_to_win' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'reward_id',
		'description',
		'type',
		'time_type',
		'category_id',
		'number_to_win',
		'status'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function reward()
	{
		return $this->belongsTo(Reward::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_challenges')
					->withPivot('id', 'status', 'progress');
	}
}
