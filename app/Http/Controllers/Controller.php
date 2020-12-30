<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator, DB, Hash, Mail;
use App\Mail\welcome;
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
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function test() {
        $data = array('email' => trim("tina@smartestmedia.com"), 'name' => "Tina", 'subject' => '2020 Year Recap!');
        // if($att['email']) {
            // Mail::send('mail', $data, function($message) {
            //     $message->to("tina@smartestmedia.com", "Tina")
            //             ->from('hello@smartestmedia.com', 'Smartest Media')
            //             ->subject('2020 Year Recap!')
            //             ->view ('welcome');
            // });
        // }
        Mail::send(new welcome());
    }

    public function home() {
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
        return view('welcome', ['settings' => $settings, 'socials' => $socials, 'section_2' => $section_2, 'section_3' => $section_3, 'services' => $services, 'statistics' => $statistics, 'section_4' => $section_4, 'section_5' => $section_5, 'section_6' => $section_6, 'section_7' => $section_7, 'steps' => $steps, 'section_8' => $section_8, 'section_9' => $section_9, 'section_10' => $section_10, 'section_11' => $section_11, 'section_12' => $section_12, 'section_13' => $section_13, 'section_14' => $section_14, 'section_15' => $section_15]);
    }
}
