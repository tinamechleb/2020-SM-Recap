<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CmsPage;
use Hash;
use File;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Validator, DB, Mail;
use App\Mail\welcome;
use App\Email;
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

class EmailController extends Controller implements  WithHeadingRow
{
    public function index() {
        $page = CmsPage::where('route', 'emails')->firstOrFail();
        $page_fields = json_decode($page['fields'], true);

        $model = 'App\\' . $page['model_name'];
        $rows = $model::when($page['order_display'], function ($query) use ($page) {
            return $query->orderBy('ht_pos');
        })
            ->when($page['server_side_pagination'], function ($query) {
                return $query->paginate(10);
            }, function ($query) {
                return $query->get();
            });

        return view('admin.custom.adminemails', compact('page', 'page_fields', 'rows'), ['page_title' => $page->display_name_plural]);
    }

    public function show($id) {
        $page = CmsPage::where('route', 'emails')->where('show', 1)->firstOrFail();
        $page_fields = json_decode($page['fields'], true);
        $translatable_fields = json_decode($page['translatable_fields'], true);

        $model = 'App\\' . $page['model_name'];
        $row = $model::findOrFail($id);

        return view('admin.custom.adminemail', compact('page', 'page_fields', 'translatable_fields', 'row'), ['page_title' => $page->display_name.' #'.$row->id]);
    }

    public function send($id) {
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
        $request = Email::where('id', $id)->first();
        
        // receivers 
        $array = \Excel::toArray(new EmailController, $request->emails_spreadsheet);

        foreach($array[0] as $att) {
            //send mail
            $data = array('email' => trim($att['email']), 'subject' => '2020 Year Recap!');
            if($att['email']) {
                // Mail::send('welcome', $data, function($message)use($data) {
                //     $message->to($data["email"])
                //             ->from('hello@smartestmedia.com', 'Smartest Media')
                //             ->subject($data["subject"]);

                // });
                Mail::send(new welcome($att['email']));
            }
        }
        Email::where('id', $id)->update(['sent' => true]);
        return redirect('admin/emails');
    }
}
