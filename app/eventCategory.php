<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventCategory extends Model
{
    protected $table = 'eventcategory';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
