<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class SitemapController extends Controller
{
    public function index()
    {
        try {
            $cats = Cat::all();

            return response()->json([
                "success" => true,
                "count" => $cats->count(),
                "cats" => $cats
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "error" => $e->getMessage()
            ], 500);

        }
    }
}