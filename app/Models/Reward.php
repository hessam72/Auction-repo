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
 * Class Reward
 * 
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Challenge[] $challenges
 *
 * @package App\Models
 */
class Reward extends Model
{
	protected $table = 'rewards';
	use HasFactory;
	protected $casts = [
		'type' => 'int',
		'amount' => 'int'
	];

	protected $fillable = [
		'name',
		'type',
		'amount'
	];
	protected static function booted () {
        static::deleting(function(Reward $reward) { // before delete() method call this
			$reward->challenges()->delete();
             
        });
    }


	public function challenges()
	{
		return $this->hasMany(Challenge::class);
	}
}
