<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return ImageResource::collection(Image::all());
    }

    public function show($id)
    {
        return Image::findOrFail($id);
    }
}
