<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestimonialSubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var mixed
     */
    public $testimonial;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank you for Submitting your Testimonial')
                    ->view('emails.testimonials.submitted', $this->testimonial);
    }
}
