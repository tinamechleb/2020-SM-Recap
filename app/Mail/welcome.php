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
use App\Section8;
use App\Section9;
use App\Section10;
use App\Section11;
use App\Section12;
use App\Section13;
use App\Section14;
use App\Section15;
use App\Service;
use App\Step;
use App\Statistic;
use App\Project;
use App\Team;
use App\Design;
use App\News;
use App\Logo;

class welcome extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
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
        $section_8 = Section8::first();
        $section_9 = Section9::first();
        $section_10 = Section10::first();
        $section_11 = Section11::first();
        $section_12 = Section12::first();
        $section_13 = Section13::first();
        $section_14 = Section14::first();
        $section_15 = Section15::first();
        $services = Service::get();
        $steps = Step::get();
        $statistics = Statistic::get();
        $projects = Project::get();
        $teams = Team::get();
        $designs = Design::get();
        $news = News::get();
        $logos = Logo::get();
        return $this->view('welcome', ['settings' => $settings, 'socials' => $socials, 'section_2' => $section_2, 'section_3' => $section_3, 'services' => $services, 'statistics' => $statistics, 'section_4' => $section_4, 'section_5' => $section_5, 'section_6' => $section_6, 'section_7' => $section_7, 'steps' => $steps, 'section_8' => $section_8, 'section_9' => $section_9, 'section_10' => $section_10, 'section_11' => $section_11, 'section_12' => $section_12, 'section_13' => $section_13, 'section_14' => $section_14, 'section_15' => $section_15, 'projects' => $projects, 'teams' => $teams, 'designs' => $designs, 'news' => $news, 'logos' => $logos])
                    ->to($this->email)
                    ->from('hello@smartestmedia.com', 'Smartest Media')
                    ->subject('2020 Year Recap!');
    }
}
