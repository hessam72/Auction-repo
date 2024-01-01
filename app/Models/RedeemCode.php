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
 * @property int $code
 * @property int $value
 * @property int $count_of_use
 * @property int $status
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
		'code' => 'int',
		'value' => 'int',
		'count_of_use' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'code',
		'value',
		'count_of_use',
		'status'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_redeem_codes')
					->withPivot('id');
	}
}
