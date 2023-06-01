<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     *
    */
	public $other_message;
    public function __construct($message)
    {
        $this->other_message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$sender_email="okomemmanuel1@gmail.com";
		//$sender_name="okom";
        return $this
        //->from($sender_email,$sender_name)
         ->subject($this->other_message['title'])
         ->markdown('emails.allemail');
    }
}
