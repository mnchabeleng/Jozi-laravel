<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListingResource;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $limit = request()->limit ? request()->limit : 9;
        $category = request()->category;
        $location = request()->location;
        $search = request()->search;

        $listings = Listing::where('title', 'like', '%'.$search.'%')
                ->paginate($limit);

        if($category && !$location)
        {
            $listings = Listing::whereHas('category', function ($query) use ($category){
                            $query->where('slug', $category);
                        })
                        ->where('title', 'like', '%'.$search.'%')
                        ->paginate($limit);
        }

        if(!$category && $location)
        {
            $listings = Listing::whereHas('location', function ($query) use ($location){
                            $query->where('slug', $location);
                        })
                        ->where('title', 'like', '%'.$search.'%')
                        ->paginate($limit);
        }

        if($category && $location)
        {
            $listings = Listing::whereHas('category', function ($query) use ($category){
                            $query->where('slug', $category);
                        })
                        ->whereHas('location', function ($query) use ($location){
                            $query->where('slug', $location);
                        })
                        ->where('title', 'like', '%'.$search.'%')
                        ->paginate($limit);
        }

        return ListingResource::collection($listings);
    }

    public function show($slug)
    {
        return new ListingResource(Listing::where('slug', $slug)->first());
    }
}
