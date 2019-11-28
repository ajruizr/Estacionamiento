<?php

namespace App\Mail;

use App\Estacionamiento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfoEstacionamiento extends Mailable
{
    use Queueable, SerializesModels;
    public $estacionamiento;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estacionamiento $estacionamiento)
    {
        $this->estacionamiento = $estacionamiento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('estacionapark@gmail.com')->view('emails.info-estacionamiento');
    }
}
