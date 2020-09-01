<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class State
 * 
 * @property int $sid
 * @property string $sname
 * @property int $countryid
 *
 * @package App\Models
 */
class State extends Eloquent
{
	protected $table = 'state';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'countryid' => 'int'
	];

	protected $fillable = [
		'sname',
		'countryid'
	];
}
