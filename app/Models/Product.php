<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $pid
 * @property string $pname
 * @property string $pcode
 * @property string $pdesc
 * @property int $price
 * @property string $pphoto
 * @property int $stock
 * @property int $subcatid
 * @property string $c_emailid
 * @property int $minimum_stock
 * @property int $msprice
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
	protected $table = 'product';
	protected $primaryKey = 'pid';
	public $timestamps = false;

	protected $casts = [
		'price' => 'int',
		'stock' => 'int',
		'subcatid' => 'int',
		'minimum_stock' => 'int',
		'msprice' => 'int'
	];

	protected $fillable = [
		'pname',
		'pcode',
		'pdesc',
		'price',
		'pphoto',
		'stock',
		'subcatid',
		'c_emailid',
		'minimum_stock',
		'msprice'
	];
}
