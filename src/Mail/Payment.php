<?php

namespace sahifedp\Sep\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Payment extends Mailable
{
    use Queueable, SerializesModels;

    public $model;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Build the message
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@baziar.com',env('APP_NAME'))
            ->subject("پرداخت جدید از ".$this->model->name.' '.$this->model->family)
            ->view('sep::Emails.payment');
    }
}
