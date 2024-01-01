<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRedeemCode
 * 
 * @property int $id
 * @property int $user_id
 * @property int $redeem_code_id
 * @property Carbon $created_at
 * 
 * @property RedeemCode $redeem_code
 * @property User $user
 *
 * @package App\Models
 */
class UserRedeemCode extends Model
{
	protected $table = 'user_redeem_codes';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'redeem_code_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'redeem_code_id'
	];

	public function redeem_code()
	{
		return $this->belongsTo(RedeemCode::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
