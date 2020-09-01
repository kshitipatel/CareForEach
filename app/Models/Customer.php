<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Customer
 * 
 * @property int $customerid
 * @property string $customername
 * @property string $customercompanyname
 * @property \Carbon\Carbon $date
 * @property string $e_emailid
 * @property string $c_emailid
 * @property int $customercontactnum
 * @property string $customeremailid
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	protected $table = 'customer';
	protected $primaryKey = 'customerid';
	public $timestamps = false;

	protected $casts = [
		'customercontactnum' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'customername',
		'customercompanyname',
		'date',
		'e_emailid',
		'c_emailid',
		'customercontactnum',
		'customeremailid'
	];
}
