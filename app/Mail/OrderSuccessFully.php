<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSuccessFully extends Mailable
{
    use Queueable, SerializesModels;

    public $productAccountStores, $username, $email, $phone, $order;
    /**
     * Create a new message instance.
     */
    public function __construct($productAccountStores, $username, $email, $phone, $order)
    {
        //
        $this->productAccountStores = $productAccountStores;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->order = $order;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thanh toán thành công',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
