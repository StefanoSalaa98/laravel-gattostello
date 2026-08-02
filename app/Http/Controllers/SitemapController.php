<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class SitemapController extends Controller
{
    //     public function index()
//     {
//         $cats = Cat::all();

    //         return response()
//             ->view('sitemap', compact('cats'))
//             ->header('Content-Type', 'application/xml');
//     }

    public function index()
    {
        return response('OK');
    }


}