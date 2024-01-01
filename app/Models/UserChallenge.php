<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserChallenge
 * 
 * @property int $id
 * @property int $user_id
 * @property int $challenge_id
 * @property int $status
 * @property int $progress
 * @property Carbon $created_at
 * 
 * @property Challenge $challenge
 * @property User $user
 *
 * @package App\Models
 */
class UserChallenge extends Model
{
	protected $table = 'user_challenges';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'challenge_id' => 'int',
		'status' => 'int',
		'progress' => 'int'
	];

	protected $fillable = [
		'user_id',
		'challenge_id',
		'status',
		'progress'
	];

	public function challenge()
	{
		return $this->belongsTo(Challenge::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
