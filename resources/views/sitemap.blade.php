<?php

namespace App\Http\Controllers;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->json([
            "test" => "controller funziona"
        ]);
    }
}