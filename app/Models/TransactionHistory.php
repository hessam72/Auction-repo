<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionHistory
 * 
 * @property int $id
 * @property int $transaction_id
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Transaction $transaction
 *
 * @package App\Models
 */
class TransactionHistory extends Model
{
	protected $table = 'transaction_histories';

	protected $casts = [
		'transaction_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'transaction_id',
		'status'
	];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}
}
