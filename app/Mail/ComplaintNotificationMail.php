<?php

namespace App\Mail;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComplaintNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $complaint;

    /**
     * Créer une nouvelle instance du message.
     */
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * Obtenir l'enveloppe du message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle plainte déposée - ' . $this->complaint->reference,
        );
    }

    /**
     * Obtenir la définition du contenu du message.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.complaint-notification',
            with: [
                'complaint' => $this->complaint,
            ],
        );
    }

    /**
     * Obtenir les pièces jointes du message.
     */
    public function attachments(): array
    {
        return [];
    }
}
