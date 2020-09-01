<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Wishlist
 * 
 * @property int $wlid
 * @property int $pid
 * @property string $e_emailid
 * @property int $qty
 * @property \Carbon\Carbon $date
 * @property string $c_emailid
 * @property int $wcid
 * @property int $sprice
 *
 * @package App\Models
 */
class Wishlist extends Eloquent
{
	protected $table = 'wishlist';
	protected $primaryKey = 'wlid';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int',
		'qty' => 'int',
		'wcid' => 'int',
		'sprice' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'pid',
		'e_emailid',
		'qty',
		'date',
		'c_emailid',
		'wcid',
		'sprice'
	];
}
