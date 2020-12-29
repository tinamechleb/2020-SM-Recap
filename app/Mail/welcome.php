<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Setting;
use App\SocialMedia;
use App\Section2;
use App\Section3;

class welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Setting::first();
        $socials = SocialMedia::get();
        $section_2 = Section2::first();
        $section_3 = Section3::first();
        return $this->view('welcome', ['settings' => $settings, 'socials' => $socials, 'section_2' => $section_2, 'section_3' => $section_3])
                    ->to("tina@smartestmedia.com", "Tina")
                    ->from('hello@smartestmedia.com', 'Smartest Media')
                    ->subject('2020 Year Recap!');
    }
}
