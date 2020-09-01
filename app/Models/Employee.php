<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $eid
 * @property string $ename
 * @property string $dob
 * @property string $joiningdate
 * @property string $designation
 * @property string $photo
 * @property string $edu
 * @property string $e_emailid
 * @property int $mobilenum
 * @property string $address
 * @property string $password
 * @property string $c_emailid
 * @property string $status
 *
 * @package App\Models
 */
class Employee extends Eloquent
{
	protected $table = 'employee';
	protected $primaryKey = 'eid';
	public $timestamps = false;

	protected $casts = [
		'mobilenum' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'ename',
		'dob',
		'joiningdate',
		'designation',
		'photo',
		'edu',
		'e_emailid',
		'mobilenum',
		'address',
		'password',
		'c_emailid',
		'status'
	];
}
