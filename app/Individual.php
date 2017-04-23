<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    protected $fillable = [
        'name', 'gender', 'dob', 'state', 'city', 'mobile', 'religion', 'marital_status', 'mother_tongue', 'image'
    ];
}
