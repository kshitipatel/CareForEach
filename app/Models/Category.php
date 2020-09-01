<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $catid
 * @property string $catname
 * @property string $c_emailid
 * @property int $gst
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	protected $primaryKey = 'catid';
	public $timestamps = false;

	protected $casts = [
		'gst' => 'int'
	];

	protected $fillable = [
		'catname',
		'c_emailid',
		'gst'
	];
}
