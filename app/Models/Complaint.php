<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Complaint
 * 
 * @property int $complaintid
 * @property string $e_emailid
 * @property \Carbon\Carbon $date
 * @property string $description
 * @property string $subject
 *
 * @package App\Models
 */
class Complaint extends Eloquent
{
	protected $table = 'complaint';
	protected $primaryKey = 'complaintid';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'e_emailid',
		'date',
		'description',
		'subject'
	];
}
