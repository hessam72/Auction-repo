<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class BuyItNowOffer
 * 
 * @property int $id
 * @property int $product_id
 * @property int $spent_bids
 * @property Carbon $time_limit
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 *
 * @package App\Models
 */
class BuyItNowOffer extends Model
{
	protected $table = 'buy_it_now_offers';
	use HasFactory;
	protected $casts = [
		'product_id' => 'int',
		'spent_bids' => 'int',
		'time_limit' => 'datetime'
	];

	protected $fillable = [
		'product_id',
		'spent_bids',
		'time_limit',
		'status'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
