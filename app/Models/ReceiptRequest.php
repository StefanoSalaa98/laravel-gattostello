<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptRequest extends Model
{
    protected $fillable = [
        'cognome',
        'nome',
        'email',
        'cf',
        'via',
        'civico',
        'citta',
        'cap',
        'importo',
        'messaggio'
    ];
}
