<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class LocationPast
 * 
 * @property int $lpid
 * @property string $late
 * @property string $log
 * @property string $e_emailid
 * @property string $date
 * @property string $time
 *
 * @package App\Models
 */
class LocationPast extends Eloquent
{
	protected $table = 'location_past';
	protected $primaryKey = 'lpid';
	public $timestamps = false;

	protected $fillable = [
		'late',
		'log',
		'e_emailid',
		'date',
		'time'
	];
}
