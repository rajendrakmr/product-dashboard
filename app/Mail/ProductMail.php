<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $link;
    public function __construct($link)
    {
        $this->link = $link; 
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->link;
        $date = date('Y-m-d H:i:s');
        return $this->subject('New Stock Uploaded')->markdown('emails.prducts',compact('data','date'));
    }
}
