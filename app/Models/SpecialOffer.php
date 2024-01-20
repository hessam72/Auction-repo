<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpecialOffer
 * 
 * @property int $id
 * @property int $type
 * @property string $description
 * @property string $type_desc

 * @property int $discount_amount
 * @property int $item_id
 * @property Carbon $expiration_date
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class SpecialOffer extends Model
{
	protected $table = 'special_offers';

	protected $casts = [
		'type' => 'int',
		'discount_amount' => 'int',
		'item_id' => 'int',
		'expiration_date' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'type',
		'description',
		'banner',
		'type_desc',
		'discount_amount',
		'item_id',
		'expiration_date',
		'status'
	];
	
}
