<?php

namespace App\Mail\LocalLivereurs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class banedLocalLivereur extends Mailable
{
    use Queueable, SerializesModels;

    public $l_livereur;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($l_livereur)
    {
        $this->l_livereur = $l_livereur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdown.local-livereur.banedLocalLivereur');
    }
}
