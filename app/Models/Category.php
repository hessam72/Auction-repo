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
 * Class Category
 * 
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Challenge[] $challenges
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	use HasFactory;
	protected $fillable = [
		'title',
		'description'
	];

	public function challenges()
	{
		return $this->hasMany(Challenge::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
