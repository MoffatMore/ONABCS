<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    //
    protected $fillable =[
       'name',
       'description',
       'user_id',
       'price'
    ];

    public function getSearchResult(): SearchResult
     {
        $url = route('product.show', $this->id);

         return new SearchResult(
            $this,
            $this->name,
            $url
         );
     }
}
