<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dogs extends Model
{
    protected $table = 'dogs';
    protected $fillable = [
	'name',
	'breed',
	'weight',
	];
}
