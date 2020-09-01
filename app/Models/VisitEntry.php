<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class VisitEntry
 * 
 * @property int $veid
 * @property string $e_emailid
 * @property string $vphoto
 * @property \Carbon\Carbon $date
 * @property string $visitername
 * @property string $companyname
 * @property string $area
 * @property string $vaddress
 * @property string $vdiscussion
 * @property string $vtime
 * @property int $vcontactnum
 * @property string $visiter_emailid
 *
 * @package App\Models
 */
class VisitEntry extends Eloquent
{
	protected $table = 'visit_entry';
	protected $primaryKey = 'veid';
	public $timestamps = false;

	protected $casts = [
		'vcontactnum' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'e_emailid',
		'vphoto',
		'date',
		'visitername',
		'companyname',
		'area',
		'vaddress',
		'vdiscussion',
		'vtime',
		'vcontactnum',
		'visiter_emailid'
	];
}
