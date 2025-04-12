<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class City
 * 
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property State $state
 * @property Collection|UserShipedProduct[] $user_shiped_products
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	use HasFactory;
	protected $casts = [
		'state_id' => 'int'
	];

	protected $fillable = [
		'state_id',
		'name'
	];


	protected static function booted()
	{
		static::deleting(function (City $city) { // before delete() method call this

			if(count($city->user_shiped_products)){
				throw new Exception("Can not delete City with Shiped product");

			}
		});
	}





	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function user_shiped_products()
	{
		return $this->hasMany(UserShipedProduct::class);
	}
	public function residents()
	{
		return $this->hasMany(User::class);
	}
}
