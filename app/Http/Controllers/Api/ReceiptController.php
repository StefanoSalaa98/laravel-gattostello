<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReceiptRequest;
use App\Mail\ReceiptRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReceiptController extends Controller
{
    public function store(Request $request)
    {
        dd(config('mail.to.address'));
        // Validazione lato server (Inviolabile)
        $validated = $request->validate([
            'cognome' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cf' => 'required|string|size:16|regex:/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$/i',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:10',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|size:5|regex:/^[0-9]{5}$/',
            'importo' => 'nullable|numeric|min:0',
            'messaggio' => 'nullable|string|max:1000'
        ]);

        // Salva nel Database usando il Modello Eloquent
        $receiptRequest = ReceiptRequest::create($validated);

        // Invia la mail all'indirizzo dell'associazione
        // Mail::to('infobellissime@gattostello.it')->send(new ReceiptRequested($receiptRequest));
        // Mail::to(config('mail.to.address'))
        //     ->send(new ReceiptRequested($receiptRequest));

        try {
            Mail::to(config('mail.to.address'))
                ->send(new ReceiptRequested($receiptRequest));
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ], 500);
        }

        // Rispondi a React con successo
        return response()->json([
            'message' => 'Richiesta salvata e mail inviata con successo!'
        ], 201);
    }
}

