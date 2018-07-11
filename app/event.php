<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
