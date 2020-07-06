<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class User extends Authenticatable implements Searchable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','location','speciality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSearchResult(): SearchResult
    {
       $url = route('users.show', $this->id);

        return new SearchResult(
           $this,
           $this->name,
           $url
        );
    }

    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }

    public function faults()
    {
        return $this->hasMany(Fault::class,'owner_id','id');
    }

    public function fix()
    {
        return $this->hasMany(Fault::class,'expert_id','id');
    }
}
