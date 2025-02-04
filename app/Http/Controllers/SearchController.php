<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $search = (new Search())
        ->registerModel(User::class, function(ModelSearchAspect $modelSearchAspect) {
            $modelSearchAspect
          ->addSearchableAttribute('location');
})
        ->search(auth()->user()->location);
        return view('search-results')->with('searchResults',$search);
    }
}
