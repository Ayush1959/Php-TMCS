<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_tracker extends Model
{
    //TABLE NAme
    protected $table = 'time_tracker';

    // protected $fillable = ['project_id', 'user_id'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}