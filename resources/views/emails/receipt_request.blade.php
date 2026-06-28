<h2>Nuova richiesta di ricevuta fiscale ricevuta dal sito</h2>
<p>Ecco i dati inseriti dal donatore:</p>

<ul>
    <li><strong>Donatore:</strong> {{ $requestData->nome }} {{ $requestData->cognome }}</li>
    <li><strong>Email:</strong> {{ $requestData->email }}</li>
    <li><strong>Codice Fiscale:</strong> {{ $requestData->cf }}</li>
    <li><strong>Indirizzo:</strong> {{ $requestData->via }}, {{ $requestData->civico }} - {{ $requestData->cap }}
        {{ $requestData->citta }}
    </li>
    <li><strong>Importo Donato:</strong> {{ $requestData->importo ? $requestData->importo . ' €' : 'Non specificato' }}
    </li>
    <li><strong>Note:</strong> {{ $requestData->messaggio ?? 'Nessuna nota' }}</li>
</ul>