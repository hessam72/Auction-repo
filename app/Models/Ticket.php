<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property int $user_id
 * @property int $admin_id
 * @property string $subject
 * @property string|null $content
 * @property string|null $attachment
 * @property int $status
 * @property int|null $reply_to_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Admin $admin
 * @property User $user
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';

	protected $casts = [
		'user_id' => 'int',
		'admin_id' => 'int',
		'status' => 'int',
		'reply_to_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'admin_id',
		'subject',
		'content',
		'attachment',
		'status',
		'reply_to_id'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function parent()
	{
		return $this->belongsTo(self::class, 'reply_to_id');
	}
	public function children()
	{
		return $this->hasMany(self::class, 'reply_to_id')->orderBy('created_at' , 'asc');
	}

}
