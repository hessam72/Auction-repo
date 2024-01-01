<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string|null $profile_pic
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Admin extends Model
{
	use HasFactory;
	protected $table = 'admins';

	protected $fillable = [
		'username',
		'email',
		'profile_pic'
	];

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
