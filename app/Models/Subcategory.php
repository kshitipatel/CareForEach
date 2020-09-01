<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Subcategory
 * 
 * @property int $subcatid
 * @property int $catid
 * @property string $c_emailid
 * @property string $subcatname
 *
 * @package App\Models
 */
class Subcategory extends Eloquent
{
	public function products()
    {
        return $this->hasMany('App\Product');
    }
	protected $table = 'subcategory';
	protected $primaryKey = 'subcatid';
	public $timestamps = false;

	protected $casts = [
		'catid' => 'int'
	];

	protected $fillable = [
		'catid',
		'c_emailid',
		'subcatname'
	];
}
