<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property string $emailid
 * @property string $password
 * @property int $aid
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $table = 'admin';
	protected $primaryKey = 'aid';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'emailid',
		'password'
	];
}
