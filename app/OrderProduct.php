<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
