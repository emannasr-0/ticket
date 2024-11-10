<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendStatusTicket extends Mailable
{
    use Queueable, SerializesModels;
    public $fromStatus;
    public $toStatus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromStatus,$toStatus)
    {
        $this->fromStatus = $fromStatus;
         $this->toStatus = $toStatus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.status_ticket')->subject('Support Ticket Closed [' . $this->fromStatus .'to'.  $this->fromStatus.']');
    }
}
