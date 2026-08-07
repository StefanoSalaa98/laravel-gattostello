<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VolunteerRequestMail;
use App\Models\VolunteerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerRequestController extends Controller
{
    public function store(Request $request)
    {
        // VALIDAZIONE
        $validated = $request->validate([

            'nome' => 'required|string|max:255',

            'cognome' => 'required|string|max:255',

            'data_nascita' => 'required|date',

            'comune_residenza' => 'required|string|max:255',

            'telefono' => 'required|string|max:30',

            'email' => 'required|email|max:255',

            'esperienza_gatti' => 'required|boolean',

            'disponibilita_settimanale' => 'required|integer|min:1|max:5',

            'orario' => 'required|in:mattina,pomeriggio,indifferente',

            'come_aiutare' => 'required|array',

            'motivazione' => 'required|string|max:5000',

        ]);


        // SALVATAGGIO NEL DATABASE
        $volunteerRequest = VolunteerRequest::create($validated);


        // INVIO EMAIL
        Mail::to(env('MAIL_TO_ADDRESS'))
            ->send(new VolunteerRequestMail($volunteerRequest));


        // RISPOSTA A REACT
        return response()->json([
            'success' => true,
            'message' => 'Richiesta inviata correttamente.'
        ], 201);
    }
}
