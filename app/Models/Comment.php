<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Comment
 * 
 * @property int $id
 * @property int $socre
 * @property string|null $title
 * @property string|null $content
 * @property int $user_id
 * @property int $product_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comments';
	use HasFactory;
	protected $casts = [
		// 'socre' => 'int',
		'user_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'quality',
		'value_for_price',
		'suggest_it',
		'packaging',
		'total_socre',
		'title',
		'content',
		'user_id',
		'product_id'
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
