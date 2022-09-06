<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('quanntph18231@fpt.edu.vn', 'KUM - Cửa hàng thời trang')
            // ->subject("Xác nhận đặt phòng")
            ->view('email')
            ->with('emails', $this->email);
        // return $this->view('view.name');
    }
}
