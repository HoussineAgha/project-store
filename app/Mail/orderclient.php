<?php

namespace App\Mail;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderclient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    //public $client;
    public $totals;
    public $cartItems;
    public function __construct(Order $order,$totals,$cartItems)
    {
        $this->order=$order;
        //$this->client=$client;
        $this->totals=$totals;
        $this->cartItems=$cartItems;



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@matjari.info')->view('emails.orderclient');
    }
}
