<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $ctid
 * @property string $ctname
 * @property int $sid
 *
 * @package App\Models
 */
class City extends Eloquent
{
	protected $table = 'city';
	protected $primaryKey = 'ctid';
	public $timestamps = false;

	protected $casts = [
		'sid' => 'int'
	];

	protected $fillable = [
		'ctname',
		'sid'
	];
}
