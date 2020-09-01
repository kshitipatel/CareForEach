<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Delay
 * 
 * @property int $delayid
 * @property int $taskid
 * @property \Carbon\Carbon $delay_date
 * @property \Carbon\Carbon $time
 * @property string $reason
 * @property string $c_emailid
 * @property string $e_emailid
 *
 * @package App\Models
 */
class Delay extends Eloquent
{
	protected $table = 'delay';
	protected $primaryKey = 'delayid';
	public $timestamps = false;

	protected $casts = [
		'taskid' => 'int'
	];

	protected $dates = [
		'delay_date',
		'time'
	];

	protected $fillable = [
		'taskid',
		'delay_date',
		'time',
		'reason',
		'c_emailid',
		'e_emailid'
	];
}
