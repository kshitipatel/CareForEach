<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ordermaster
 * 
 * @property int $oid
 * @property int $grandtotal
 * @property \Carbon\Carbon $date
 * @property string $paymentmode
 * @property string $e_emailid
 * @property string $c_emailid
 * @property int $customerid
 * @property int $paidamount
 *
 * @package App\Models
 */
class Ordermaster extends Eloquent
{
	protected $table = 'ordermaster';
	protected $primaryKey = 'oid';
	public $timestamps = false;

	protected $casts = [
		'grandtotal' => 'int',
		'customerid' => 'int',
		'paidamount' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'grandtotal',
		'date',
		'paymentmode',
		'e_emailid',
		'c_emailid',
		'customerid',
		'paidamount'
	];
}
