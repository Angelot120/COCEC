<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Storage;

class AccountSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private $submissionData,
        private $data,
        private $references,
        private $beneficiaries,
        private $type = 'physique'
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $type = $this->type === 'physique' ? 'Personne Physique' : 'Personne Morale';
        return new Envelope(
            subject: "Nouvelle demande d'ouverture de compte - {$type} - COCEC",
            from: new Address('comptes@cocectogo.org', 'COCEC - Service Comptes'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->type === 'physique' ? 'mails.account-submission-physique' : 'mails.account-submission-morale';
        
        return new Content(
            view: $view,
            with: [
                'submissionData' => $this->submissionData,
                'data' => $this->data,
                'references' => $this->references,
                'beneficiaries' => $this->beneficiaries,
                'type' => $this->type,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        
        if ($this->type === 'physique') {
            // Pièces jointes pour personne physique
            if ($this->submissionData->photo_path && Storage::disk('public')->exists($this->submissionData->photo_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->photo_path)
                    ->as('Photo_' . $this->submissionData->last_name . '_' . $this->submissionData->first_names . '.' . pathinfo($this->submissionData->photo_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->photo_path, PATHINFO_EXTENSION));
            }
            
            if ($this->submissionData->id_scan_path && Storage::disk('public')->exists($this->submissionData->id_scan_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->id_scan_path)
                    ->as('Piece_Identite_' . $this->submissionData->last_name . '_' . $this->submissionData->first_names . '.pdf')
                    ->withMime('application/pdf');
            }
            
            if ($this->submissionData->residence_plan_path && Storage::disk('public')->exists($this->submissionData->residence_plan_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->residence_plan_path)
                    ->as('Plan_Residence_' . $this->submissionData->last_name . '_' . $this->submissionData->first_names . '.' . pathinfo($this->submissionData->residence_plan_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->residence_plan_path, PATHINFO_EXTENSION));
            }
            
            if ($this->submissionData->workplace_plan_path && Storage::disk('public')->exists($this->submissionData->workplace_plan_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->workplace_plan_path)
                    ->as('Plan_Travail_' . $this->submissionData->last_name . '_' . $this->submissionData->first_names . '.' . pathinfo($this->submissionData->workplace_plan_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->workplace_plan_path, PATHINFO_EXTENSION));
            }
            
            if ($this->submissionData->signature_upload_path && Storage::disk('public')->exists($this->submissionData->signature_upload_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->signature_upload_path)
                    ->as('Signature_' . $this->submissionData->last_name . '_' . $this->submissionData->first_names . '.' . pathinfo($this->submissionData->signature_upload_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->signature_upload_path, PATHINFO_EXTENSION));
            }
        } else {
            // Pièces jointes pour personne morale
            if ($this->submissionData->company_document_path && Storage::disk('public')->exists($this->submissionData->company_document_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->company_document_path)
                    ->as('Document_Entreprise_' . $this->submissionData->company_name . '.pdf')
                    ->withMime('application/pdf');
            }
            
            if ($this->submissionData->responsible_persons_photo_path && Storage::disk('public')->exists($this->submissionData->responsible_persons_photo_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->responsible_persons_photo_path)
                    ->as('Photo_Responsables_' . $this->submissionData->company_name . '.' . pathinfo($this->submissionData->responsible_persons_photo_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->responsible_persons_photo_path, PATHINFO_EXTENSION));
            }
            
            if ($this->submissionData->company_plan_path && Storage::disk('public')->exists($this->submissionData->company_plan_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->company_plan_path)
                    ->as('Plan_Entreprise_' . $this->submissionData->company_name . '.' . pathinfo($this->submissionData->company_plan_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->company_plan_path, PATHINFO_EXTENSION));
            }
            
            if ($this->submissionData->signature_upload_path && Storage::disk('public')->exists($this->submissionData->signature_upload_path)) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->submissionData->signature_upload_path)
                    ->as('Signature_Entreprise_' . $this->submissionData->company_name . '.' . pathinfo($this->submissionData->signature_upload_path, PATHINFO_EXTENSION))
                    ->withMime('image/' . pathinfo($this->submissionData->signature_upload_path, PATHINFO_EXTENSION));
            }
        }
        
        return $attachments;
    }
}
