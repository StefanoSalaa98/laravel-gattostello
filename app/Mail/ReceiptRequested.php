<?php

namespace App\Mail;

use App\Models\ReceiptRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptRequested extends Mailable
{
    use Queueable, SerializesModels;

    // Rendo la variabile pubblica così sarà accessibile nella vista HTML
    public $requestData;

    public function __construct(ReceiptRequest $requestData)
    {
        $this->requestData = $requestData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuova Richiesta Ricevuta Fiscale - ' . $this->requestData->nome . ' ' . $this->requestData->cognome,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.receipt_request',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
