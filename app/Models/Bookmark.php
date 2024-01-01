<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Bookmark
 * 
 * @property int $id
 * @property int $user_id
 * @property int $auction_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Auction $auction
 * @property User $user
 *
 * @package App\Models
 */
class Bookmark extends Model
{
	protected $table = 'bookmarks';
use HasFactory;
	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'auction_id'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
