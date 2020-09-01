<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 10:25:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $msgid
 * @property \Carbon\Carbon $datetime
 * @property string $e_emailid
 * @property string $c_emailid
 * @property string $text
 * @property string $sender
 * @property string $time
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	protected $table = 'message';
	protected $primaryKey = 'msgid';
	public $timestamps = false;

	protected $dates = [
		'datetime'
	];

	protected $fillable = [
		'datetime',
		'e_emailid',
		'c_emailid',
		'text',
		'sender',
		'time'
	];
}
