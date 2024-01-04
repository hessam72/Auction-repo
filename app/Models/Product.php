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
 * Class Product
 * 
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property int $discount
 * @property int $sales_count
 * @property string|null $short_desc
 * @property string|null $description
 * @property int|null $price
 * @property int $product_inventory
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Collection|Auction[] $auctions
 * @property Collection|BuyItNowOffer[] $buy_it_now_offers
 * @property Collection|Comment[] $comments
 * @property Collection|ProductGallery[] $product_galleries
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	use HasFactory;

	protected $casts = [
		// 'category_id' => 'int',
		'discount' => 'int',
		'sales_count' => 'int',
		'price' => 'int',
		'product_inventory' => 'int'
	];

	protected $fillable = [
		'category_id',
		'title',
		'discount',
		'sales_count',
		'short_desc',
		'description',
		'price',
		'product_inventory'
	];

	protected static function booted () {
        static::deleting(function(Product $product) { // before delete() method call this
			// delete relared auctions - buy it offers - comments - product gallery
			$product->auctions()->delete();
			$product->buy_it_now_offers()->delete();
			$product->comments()->delete();
			$product->product_galleries()->delete();
             
        });
    }



	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function auctions()
	{
		return $this->hasMany(Auction::class);
	}

	public function buy_it_now_offers()
	{
		return $this->hasMany(BuyItNowOffer::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function product_galleries()
	{
		return $this->hasMany(ProductGallery::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_shiped_products')
					->withPivot('id', 'status', 'address', 'postal_code', 'state_id', 'city_id')
					->withTimestamps();
	}
}
