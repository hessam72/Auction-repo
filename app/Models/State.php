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
 * Class State
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|City[] $cities
 * @property Collection|UserShipedProduct[] $user_shiped_products
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'states';
	use HasFactory;
	protected $fillable = [
		'name'
	];

	protected static function booted () {
        static::deleting(function(State $state) { // before delete() method call this
			$state->cities()->delete();
             
        });
    }


	public function cities()
	{
		return $this->hasMany(City::class);
	}

	public function user_shiped_products()
	{
		return $this->hasMany(UserShipedProduct::class);
	}
}
