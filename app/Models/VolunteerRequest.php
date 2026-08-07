<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerRequest extends Model
{
    protected $fillable = [
        'nome',
        'cognome',
        'data_nascita',
        'comune_residenza',
        'telefono',
        'email',
        'esperienza_gatti',
        'disponibilita_settimanale',
        'orario',
        'come_aiutare',
        'motivazione',
    ];

    protected $casts = [
        'esperienza_gatti' => 'boolean',
        'data_nascita' => 'date',
        'come_aiutare' => 'array',
    ];
}