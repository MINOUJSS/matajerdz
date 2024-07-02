<?php

namespace App\Mail\CompanyLivereurs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteCompanyLivereur extends Mailable
{
    use Queueable, SerializesModels;

    public $c_livereur;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($c_livereur)
    {
        $this->c_livereur = $c_livereur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdown.company-livereur.DeleteCompanyLivereur');
    }
}
