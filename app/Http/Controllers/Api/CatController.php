<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{

    public function index(Request $request)
    {
        $page = (int) ($request->page ?? 1);

        $limit = 12;
        $offset = ($page - 1) * $limit;

        // preparazione query in base ai criteri passati dal frontend
        $query = Cat::query()
            ->when(
                $request->has('adottato'),
                fn($q) => $q->where('adottato', $request->adottato)
            )
            ->when(
                $request->has('prenotato'),
                fn($q) => $q->where('prenotato', $request->prenotato)
            );

        // totale gatti presenti
        $totalCats = $query->count();

        // totale pagine
        $totalPages = ceil($totalCats / $limit);

        // query finale
        $cats = $query
            ->limit($limit)
            ->offset($offset)
            ->get();

        return response()->json([
            "success" => true,
            "current_page" => $page,
            "total_pages" => $totalPages,
            "total_cats" => $totalCats,
            "data" => $cats
        ]);
    }
}
