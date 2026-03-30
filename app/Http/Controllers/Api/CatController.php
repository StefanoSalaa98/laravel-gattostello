<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(Request $request)
    {

        $cats = Cat::query()
            ->when(
                $request->has('adottato'),
                fn($q) => $q->where('adottato', $request->adottato)
            )
            ->when(
                $request->has('prenotato'),
                fn($q) => $q->where('prenotato', $request->prenotato)
            )
            ->get();

        return response()->json(
            [
                "success" => true,
                "data" => $cats
            ]
        );
    }
}
