<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MyVender
 * 
 * @property int $vid
 * @property string $contactpersonname
 * @property string $companyname
 * @property string $contact
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $productname
 * @property string $photo
 * @property string $c_emailid
 * @property string $mail_data
 *
 * @package App\Models
 */
class MyVender extends Eloquent
{
	protected $table = 'my_vender';
	protected $primaryKey = 'vid';
	public $timestamps = false;

	protected $fillable = [
		'contactpersonname',
		'companyname',
		'contact',
		'email',
		'address',
		'city',
		'productname',
		'photo',
		'c_emailid',
		'mail_data'
	];
}
