<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    

    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct(Order $order)  
    {
       $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->order->billing_email, $this->order->billing_name)
                    ->subject('Pedido en Cynthia_Veneno')
                    ->markdown('emails.orders.placed');
    }
}
