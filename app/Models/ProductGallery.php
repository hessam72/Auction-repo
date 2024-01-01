<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class ProductGallery
 * 
 * @property int $id
 * @property int $product_id
 * @property string|null $image
 * @property int $type
 * 
 * @property Product $product
 *
 * @package App\Models
 */
class ProductGallery extends Model
{
	protected $table = 'product_galleries';
	use HasFactory;
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'type' => 'int'
	];

	protected $fillable = [
		'product_id',
		'image',
		'type'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
