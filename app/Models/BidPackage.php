<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class BidPackage
 * 
 * @property int $id
 * @property int $bid_amount
 * @property int $price
 * @property int $discount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class BidPackage extends Model
{
	protected $table = 'bid_packages';
	use HasFactory;
	protected $casts = [
		'bid_amount' => 'int',
		'price' => 'int',
		'discount' => 'int'
	];

	protected $fillable = [
		'bid_amount',
		'price',
		'discount'
	];
}
