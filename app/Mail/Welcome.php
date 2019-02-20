<?php

namespace Kinytron\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;


class Welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    public function __construct(Request $request)
    {
        $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome')->from('noreply@kinytron.com')->subject('Bienvenido a Kinytron');
    }
}
