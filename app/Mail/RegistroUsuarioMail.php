<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistroUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $passwordTemporal;

    /**
     * Create a new message instance.
     */
    public function __construct(User $usuario, string $passwordTemporal)
    {
        $this->usuario = $usuario;
        $this->passwordTemporal = $passwordTemporal;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido, tu cuenta de usuario ha sido creada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.usuarios.email_registro_usuario',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
