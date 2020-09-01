<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WishlistCust
 * 
 * @property int $wcid
 * @property string $custname
 * @property \Carbon\Carbon $expecteddate
 * @property string $custemailid
 * @property int $custmobile
 * @property string $custaddress
 * @property string $cust_company_name
 * @property string $custdesc
 * @property string $e_emailid
 *
 * @package App\Models
 */
class WishlistCust extends Eloquent
{
	protected $table = 'wishlist_cust';
	protected $primaryKey = 'wcid';
	public $timestamps = false;

	protected $casts = [
		'custmobile' => 'int'
	];

	protected $dates = [
		'expecteddate'
	];

	protected $fillable = [
		'custname',
		'expecteddate',
		'custemailid',
		'custmobile',
		'custaddress',
		'cust_company_name',
		'custdesc',
		'e_emailid'
	];
}
