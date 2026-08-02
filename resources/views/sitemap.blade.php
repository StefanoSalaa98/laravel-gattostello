<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class SitemapController extends Controller
{
    public function index()
    {
        $cats = Cat::all();

        return response()->json($cats);
    }
}