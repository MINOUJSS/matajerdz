<?php

namespace App\Mail\Suppliers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class unbanedSupplier extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $supplier;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($supplier)
    {
        $this->supplier=$supplier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdown.supplier.unbanedSupplier');
    }
}