<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Country
 * 
 * @property int $countryid
 * @property string $countryname
 *
 * @package App\Models
 */
class Country extends Eloquent
{
	protected $table = 'country';
	protected $primaryKey = 'countryid';
	public $timestamps = false;

	protected $fillable = [
		'countryname'
	];
}
