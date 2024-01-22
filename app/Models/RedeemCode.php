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
 * Class RedeemCode
 * 
 * @property int $id
 * @property string $code
 * @property int $value
 * @property int $use_limit_count
 * @property int $used_count
 * @property int $status
 * @property string $description
 * @property Carbon $created_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class RedeemCode extends Model
{
	protected $table = 'redeem_codes';
	use HasFactory;
	public $timestamps = false;

	protected $casts = [
		'code' => 'string',
		'value' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'code',
		'value',
		'status',
		'use_limit_count',
		'used_count',
		'description',
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_redeem_codes')
			->withPivot('id');
	}
}
