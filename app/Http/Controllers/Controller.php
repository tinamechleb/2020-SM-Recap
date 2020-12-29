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
use App\Service;
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
        $services = Service::get();
        return view('welcome', ['settings' => $settings, 'socials' => $socials, 'section_2' => $section_2, 'section_3' => $section_3, 'services' => $services]);
    }
}
