<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class UserShipedProduct
 * 
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property string $address
 * @property int $postal_code
 * @property int $product_id
 * @property int $state_id
 * @property int $city_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property City $city
 * @property Product $product
 * @property State $state
 * @property User $user
 *
 * @package App\Models
 */
class UserShipedProduct extends Model
{
	protected $table = 'user_shiped_products';
	use HasFactory;
	protected $casts = [
		'user_id' => 'int',
		'status' => 'int',
		'postal_code' => 'int',
		'product_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'status',
		'address',
		'postal_code',
		'product_id',
		'state_id',
		'city_id',
		'price'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
