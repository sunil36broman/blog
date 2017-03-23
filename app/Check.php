<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public $timestamps = false;
    protected $fillable = ['checkvalue'];
    protected $table = 'checks';
}
