<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Attendance
 * 
 * @property int $attid
 * @property string $logintime
 * @property string $logouttime
 * @property \Carbon\Carbon $date
 * @property string $e_emailid
 * @property string $long_login
 * @property string $late_login
 * @property string $long_logout
 * @property string $late_logout
 * @property string $location
 * @property string $location_logout
 *
 * @package App\Models
 */
class Attendance extends Eloquent
{
	protected $table = 'attendance';
	protected $primaryKey = 'attid';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'logintime',
		'logouttime',
		'date',
		'e_emailid',
		'long_login',
		'late_login',
		'long_logout',
		'late_logout',
		'location',
		'location_logout'
	];
}
