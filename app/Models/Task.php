<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Task
 * 
 * @property int $taskid
 * @property string $e_emailid
 * @property string $c_emailid
 * @property \Carbon\Carbon $date
 * @property string $task_title
 * @property string $task_desc
 * @property string $status
 * @property \Carbon\Carbon $task_date
 * @property \Carbon\Carbon $status_date
 * @property string $time
 *
 * @package App\Models
 */
class Task extends Eloquent
{
	protected $table = 'task';
	protected $primaryKey = 'taskid';
	public $timestamps = false;

	protected $dates = [
		'date',
		'task_date',
		'status_date'
	];

	protected $fillable = [
		'e_emailid',
		'c_emailid',
		'date',
		'task_title',
		'task_desc',
		'status',
		'task_date',
		'status_date',
		'time'
	];
}
