<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property int $user_id
 * @property int $amount
 * @property Carbon $created_at
 * 
 * @property User $user
 * @property Collection|TransactionHistory[] $transaction_histories
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'amount' => 'int'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'order_id',
		'item_type',
		'item_id',
		'payment_description',
		'payment_id',
		'status',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function transaction_histories()
	{
		return $this->hasMany(TransactionHistory::class);
	}
}
