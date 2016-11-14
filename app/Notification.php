<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = 'notifications';
	protected $fillable = ['id', 'type', 'content', 'stat'];
    public $timestamps = true;
}
