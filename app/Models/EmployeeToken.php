<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeeToken
 * 
 * @property int $etid
 * @property string $e_emailid
 * @property string $e_token_id
 *
 * @package App\Models
 */
class EmployeeToken extends Eloquent
{
	protected $table = 'employee_token';
	protected $primaryKey = 'etid';
	public $timestamps = false;

	protected $fillable = [
		'e_emailid',
		'e_token_id'
	];
}
