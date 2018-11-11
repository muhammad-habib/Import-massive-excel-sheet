<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patients';
    protected $fillable = ['first_name', 'second_name', 'family_name', 'uid', 'valid'];
}
