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
        'status'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public function expert()
    {
        return $this->belongsTo(User::class,'expert_id','id');
    }
}
