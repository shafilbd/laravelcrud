<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public $timestamps = false;
	protected $table = 'contact'
    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];

}
