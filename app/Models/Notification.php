<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Notification
 * 
 * @property int $notificationid
 * @property string $notification_type
 * @property \Carbon\Carbon $date
 * @property string $notification_for
 * @property string $notification_msg
 * @property string $e_emailid
 * @property string $c_emailid
 * @property string $time
 *
 * @package App\Models
 */
class Notification extends Eloquent
{
	protected $table = 'notification';
	protected $primaryKey = 'notificationid';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'notification_type',
		'date',
		'notification_for',
		'notification_msg',
		'e_emailid',
		'c_emailid',
		'time'
	];
}
