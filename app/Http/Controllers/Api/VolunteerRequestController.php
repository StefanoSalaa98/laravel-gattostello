<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VolunteerRequest;
use Illuminate\Http\Request;

class VolunteerRequestController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([

            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',

            'data_nascita' => 'required|date',

            'comune_residenza' => 'required|string|max:255',

            'telefono' => 'required|string|max:50',

            'email' => 'required|email',

            'esperienza_gatti' => 'required',

            'disponibilita_settimanale' => 'required|integer',

            'orario' => 'required|string',

            'come_aiutare' => 'required|array',

            'motivazione' => 'required|string|max:3000'

        ]);


        $volunteerRequest = VolunteerRequest::create($validated);


        return response()->json([
            "message" => "Richiesta volontario ricevuta correttamente"
        ], 201);

    }
}
