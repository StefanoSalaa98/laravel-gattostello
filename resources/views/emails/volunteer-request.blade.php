<!DOCTYPE html>

<html lang="it"> <head> <meta charset="UTF-8"> <title>Nuova richiesta di volontariato</title> </head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">

<h2>🐾 Nuova richiesta di volontariato</h2>

<p>
    È stata ricevuta una nuova richiesta per diventare volontario del Gattostello.
</p>

<hr>

<h3>Dati personali</h3>

<p>
    <strong>Nome:</strong>
    {{ $volunteerRequest->nome }}
</p>

<p>
    <strong>Cognome:</strong>
    {{ $volunteerRequest->cognome }}
</p>

<p>
    <strong>Data di nascita:</strong>
    {{ $volunteerRequest->data_nascita->format('d/m/Y') }}
</p>

<p>
    <strong>Comune di residenza:</strong>
    {{ $volunteerRequest->comune_residenza }}
</p>

<p>
    <strong>Telefono:</strong>
    {{ $volunteerRequest->telefono }}
</p>

<p>
    <strong>Email:</strong>
    {{ $volunteerRequest->email }}
</p>

<hr>

<h3>Disponibilità</h3>

<p>
    <strong>Esperienza con i gatti:</strong>

    {{ $volunteerRequest->esperienza_gatti ? 'Sì' : 'No' }}
</p>

<p>
    <strong>Disponibilità settimanale:</strong>
    {{ $volunteerRequest->disponibilita_settimanale }}
    {{ $volunteerRequest->disponibilita_settimanale == 1 ? 'volta' : 'volte' }}
</p>

<p>
    <strong>Orario:</strong>

    @switch($volunteerRequest->orario)

        @case('mattina')
            Mattina 8/8.30 fino a fine turno
            @break

        @case('pomeriggio')
            Pomeriggio 17.15/17.30 fino a fine turno
            @break

        @case('indifferente')
            Indifferente
            @break

        @default
            {{ $volunteerRequest->orario }}

    @endswitch

</p>

<hr>

<h3>Come vorrebbe aiutare</h3>

@if(!empty($volunteerRequest->come_aiutare))

    <ul>

        @foreach($volunteerRequest->come_aiutare as $aiuto)

            <li>

                @switch($aiuto)

                    @case('cura_gatti')
                        Cura dei gatti e pulizie
                        @break

                    @case('trasporti')
                        Trasporti
                        @break

                    @case('raccolte_pappe')
                        Raccolte pappe
                        @break

                    @case('eventi')
                        Eventi
                        @break

                    @case('social_media')
                        Social media
                        @break

                    @case('dove_serve')
                        Dove c'è bisogno
                        @break

                    @default
                        {{ $aiuto }}

                @endswitch

            </li>

        @endforeach

    </ul>

@else

    <p>Nessuna preferenza indicata.</p>

@endif

<hr>

<h3>Presentazione e motivazione</h3>

<p style="white-space: pre-line;">
    {{ $volunteerRequest->motivazione }}
</p>

<hr>

<p style="font-size: 12px; color: #777;">
    Questa email è stata generata automaticamente dal sito del Gattostello.
</p>

</body>ù
</html>