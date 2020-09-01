<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Payment
 * 
 * @property int $paymentid
 * @property int $customerid
 * @property int $oid
 * @property string $e_emailid
 * @property string $c_emailid
 * @property int $amount
 * @property string $paymenttype
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $reminddate
 *
 * @package App\Models
 */
class Payment extends Eloquent
{
	protected $table = 'payment';
	protected $primaryKey = 'paymentid';
	public $timestamps = false;

	protected $casts = [
		'customerid' => 'int',
		'oid' => 'int',
		'amount' => 'int'
	];

	protected $dates = [
		'date',
		'reminddate'
	];

	protected $fillable = [
		'customerid',
		'oid',
		'e_emailid',
		'c_emailid',
		'amount',
		'paymenttype',
		'date',
		'reminddate'
	];
}
