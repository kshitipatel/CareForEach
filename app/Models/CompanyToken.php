<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompanyToken
 * 
 * @property int $ctid
 * @property string $c_emailid
 * @property string $c_token_id
 *
 * @package App\Models
 */
class CompanyToken extends Eloquent
{
	protected $table = 'company_token';
	protected $primaryKey = 'ctid';
	public $timestamps = false;

	protected $fillable = [
		'c_emailid',
		'c_token_id'
	];
}
