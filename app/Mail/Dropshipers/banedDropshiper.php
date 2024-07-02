<?php

namespace App\Mail\Dropshipers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class banedDropshiper extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $dropshiper;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dropshiper)
    {
        $this->dropshiper =$dropshiper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdown.dropshiper.banedDropshiper');
    }
}
