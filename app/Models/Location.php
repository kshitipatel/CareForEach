<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Location
 * 
 * @property int $locid
 * @property string $late
 * @property string $log
 * @property string $e_emailid
 * @property \Carbon\Carbon $date
 * @property string $time
 *
 * @package App\Models
 */
class Location extends Eloquent
{
	protected $table = 'location';
	protected $primaryKey = 'locid';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'late',
		'log',
		'e_emailid',
		'date',
		'time'
	];
}
