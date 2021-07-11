<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $apiUrl = 'http://localhost:8000/api';
        return [
            'users' => $apiUrl . '/users',
            'listings' => $apiUrl . '/listings',
            'categories' => $apiUrl . '/categories',
            'locations' => $apiUrl . '/locations',
            'images' => $apiUrl . '/images'
        ];
    }
}
