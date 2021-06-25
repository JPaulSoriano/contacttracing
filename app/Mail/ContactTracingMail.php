<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Tracing;

class ContactTracingMail extends Mailable
{
    use Queueable, SerializesModels;

    public Tracing $qr;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tracing $qr)
    {
        $this->qr = $qr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact');
    }
}
