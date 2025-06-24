<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class validatedDocNotifier extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $data = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    //builder
    public function build()
    {
        // send email here
        return $this->from('denr5.rfsoats.mailer@gmail.com', 'DENR V')
            ->subject($this->data['subject'])
            ->view('emails.validatedDocNotifier')
            ->with('data', $this->data);
    }
}
