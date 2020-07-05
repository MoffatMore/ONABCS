<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    //
    protected $fillable =[
        'name',
        'picture',
        'description',
        'expert_id',
        'owner_id',
    ];
}
