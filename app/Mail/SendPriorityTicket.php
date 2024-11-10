<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPriorityTicket extends Mailable
{
    use Queueable, SerializesModels;
    public $fromPriority;
    public $toPriority;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromPriority,$toPriority)
    {
        $this->fromPriority = $fromPriority;
         $this->toPriority = $toPriority;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.priority_ticket')->subject('Support Ticket Closed [' . $this->fromPriority .'to'.  $this->fromPriority.']');
    }
}
