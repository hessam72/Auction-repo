<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserIp
 * 
 * @property int $id
 * @property string $ip_address
 * @property int $user_id
 * @property Carbon $created_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class UserIp extends Model
{
	protected $table = 'user_ips';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'ip_address',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
