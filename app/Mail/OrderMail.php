<?php

namespace App\Mail;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Новая заказ на сайте Номерус.РФ')
            ->markdown('emails.order')
            ->with([
            'client_type' => $this->order->client_type,
            'name' => $this->order->name,
            'tel' => $this->order->tel,
            'price' => $this->order->price,
            'company' => $this->order->company,
            'email' => $this->order->email,
            'items' => $this->order->orderItems,
            'city' => $this->order->city->name,
        ]);
    }
}