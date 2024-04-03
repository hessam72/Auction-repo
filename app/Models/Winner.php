<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Observers\WinnerObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Winner
 * 
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $win_price
 * @property Carbon $created_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
#[ObservedBy([WinnerObserver::class])]
class Winner extends Model
{
	protected $table = 'winners';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'product_id' => 'int',
		'win_price' => 'int'
	];

	protected $fillable = [
		'user_id',
		'product_id',
		'win_price',
		'status'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
