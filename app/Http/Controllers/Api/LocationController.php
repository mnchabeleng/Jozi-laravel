<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        return LocationResource::collection(Location::all());
    }

    public function show($id)
    {
        return new LocationResource(Location::findOrFail($id));
    }
}
