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
	protected static function booted()
	{
		//  submit discount to the item 
		static::created(function (SpecialOffer $sp) {
			$sp->modifyItemDiscount($sp);
		});
		static::updated(function (SpecialOffer $sp) {
			$sp->modifyItemDiscount($sp);
		});
		static::deleting(function (SpecialOffer $sp) {
			$sp->modifyItemDiscount($sp, 1);
		});
	}



	public function modifyItemDiscount($sp, $delete = 0)
	{

		// check if item is active
		if (!$sp->status) {
			return;
		}
		if ($sp->type === 2) {
			// product
			$item = Product::find($sp->item_id);
		} elseif ($sp->type === 1) {
			// bid package
			$item = BidPackage::find($sp->item_id);
		}


		// check if its deeting senario
		if ($delete) {
			$item->discount = 0;
		} else {
			$item->discount = $sp->discount_amount;
		}

		$item->save();
	}


	public function bidPackage()
	{
		return $this->belongsTo(BidPackage::class, 'item_id');
	}
	public function product()
	{
		return $this->belongsTo(Product::class, 'item_id');
	}
	public function scopeItem()
	{
		if ($this->type === 1) {
			// bid
			
		} elseif ($this->type === 2) {
			// product
			
		}
		// if($this->type)
	}

	// public function scopeItem($query)
	// {

	// 	return $query
	// 		->when($this->type === 1, function ($q) {
	// 			return $q->with('bidPackage');
	// 		})
	// 		->when($this->type === 2, function ($q) {
	// 			return $q->with('product');
	// 		});

	// }
}
