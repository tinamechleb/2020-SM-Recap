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
use App\Section4;
use App\Section5;
use App\Section6;
use App\Section7;
use App\Service;
use App\Statistic;

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
        $section_4 = Section4::first();
        $section_5 = Section5::first();
        $section_6 = Section6::first();
        $section_7 = Section7::first();
        $services = Service::get();
        $statistics = Statistic::get();
        return $this->view('welcome', ['settings' => $settings, 'socials' => $socials, 'section_2' => $section_2, 'section_3' => $section_3, 'services' => $services, 'statistics' => $statistics, 'section_4' => $section_4, 'section_5' => $section_5, 'section_6' => $section_6, 'section_7' => $section_7])
                    ->to("tina@smartestmedia.com", "Tina")
                    ->from('hello@smartestmedia.com', 'Smartest Media')
                    ->subject('2020 Year Recap!');
    }
}
