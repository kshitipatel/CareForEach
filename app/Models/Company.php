<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Company
 * 
 * @property int $cid
 * @property string $c_emailid
 * @property int $mobile
 * @property string $cname
 * @property string $personname
 * @property string $address
 * @property string $designation
 * @property int $ctid
 * @property int $totalemp
 * @property string $password
 * @property string $regdate
 * @property string $c_photo
 * @property string $cstatus
 *
 * @package App\Models
 */
class Company extends Eloquent
{
	protected $table = 'company';
	protected $primaryKey = 'cid';
	public $timestamps = false;

	protected $casts = [
		'mobile' => 'int',
		'ctid' => 'int',
		'totalemp' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'c_emailid',
		'mobile',
		'cname',
		'personname',
		'address',
		'designation',
		'ctid',
		'totalemp',
		'password',
		'regdate',
		'c_photo',
		'cstatus'
	];
}
