<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cart
 * 
 * @property int $cartid
 * @property int $pid
 * @property string $e_emailid
 * @property int $qty
 * @property \Carbon\Carbon $date
 * @property string $c_emailid
 * @property int $sprice
 *
 * @package App\Models
 */
class Cart extends Eloquent
{
	protected $table = 'cart';
	protected $primaryKey = 'cartid';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int',
		'qty' => 'int',
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
		'sprice'
	];
}
