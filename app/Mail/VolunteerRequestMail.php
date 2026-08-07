<?php

namespace App\Mail;

use App\Models\VolunteerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public VolunteerRequest $volunteerRequest
    ) {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuova richiesta di volontariato - Gattostello',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.volunteer-request',
            with: [
                'volunteerRequest' => $this->volunteerRequest,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}