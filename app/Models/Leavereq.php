<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Leavereq
 * 
 * @property int $lrid
 * @property string $e_emailid
 * @property \Carbon\Carbon $requestdate
 * @property string $reason
 * @property \Carbon\Carbon $leaveenddate
 * @property \Carbon\Carbon $leavestartdate
 * @property string $status
 * @property string $e_token
 *
 * @package App\Models
 */
class Leavereq extends Eloquent
{
	protected $table = 'leavereq';
	protected $primaryKey = 'lrid';
	public $timestamps = false;

	protected $dates = [
		'requestdate',
		'leaveenddate',
		'leavestartdate'
	];

	protected $hidden = [
		'e_token'
	];

	protected $fillable = [
		'e_emailid',
		'requestdate',
		'reason',
		'leaveenddate',
		'leavestartdate',
		'status',
		'e_token'
	];
}
