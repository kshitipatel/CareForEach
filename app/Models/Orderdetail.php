<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderdetail
 * 
 * @property int $odetailid
 * @property int $pid
 * @property int $qty
 * @property int $oid
 * @property int $sprice
 * @property int $gst
 * @property string $pname
 * @property string $pcode
 * @property string $pdesc
 * @property string $pphoto
 *
 * @package App\Models
 */
class Orderdetail extends Eloquent
{
	protected $primaryKey = 'odetailid';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int',
		'qty' => 'int',
		'oid' => 'int',
		'sprice' => 'int',
		'gst' => 'int'
	];

	protected $fillable = [
		'pid',
		'qty',
		'oid',
		'sprice',
		'gst',
		'pname',
		'pcode',
		'pdesc',
		'pphoto'
	];
}
