<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order=$order;
    }

    public $tries=4;
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('سفارش شما در سایت دیجی کالا')->view('email.order',['order'=>$this->order]);
    }
}
