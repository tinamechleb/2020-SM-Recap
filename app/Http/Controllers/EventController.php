<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, DB, Hash, Mail;
use App\User;
use App\Event;
// use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PDF;

class EventController implements  WithHeadingRow
{
    public function send($id) {
        $request = Event::where('id', $id)->first();
        
        // attendees 
        $array = \Excel::toArray(new EventController, $request->attendees_sheet);
        
        foreach($array[0] as $att) {
            // print pdf
            $pdf = PDF::loadView('attendee', ['name' => $att['name'], 'event_type' => $request->event_type, 'event_name' => $request->event_name, 'event_date' => $request->event_date, 'hours' => $request->hours, 'sr' => $request->sr, 'date_of_issue' => $request->date_of_issue])->setPaper('a4', 'landscape');
            //send it by mail
            $data = array('email' => trim($att['email']), 'name' => $att['name'], 'subject' => 'Attending Certificate');
            if($att['email']) {
                Mail::send('mail', $data, function($message)use($data, $pdf) {
                    $message->to($data["email"], $data['name'])
                            ->from('certificates@energize-sa.com', 'Energize')
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), "AttendingCertificate.pdf");
                });
            }
        }

        // speakers
        $arraySP = \Excel::toArray(new EventController, $request->speakers_sheet);
        foreach($arraySP[0] as $spea) {
            // print pdf 
            $pdfSP = PDF::loadView('speaker', ['name' => $spea['name'], 'event_type' => $request->event_type, 'event_name' => $request->event_name, 'event_date' => $request->event_date, 'hours' => $request->hours, 'sr' => $request->sr, 'date_of_issue' => $request->date_of_issue])->setPaper('a4', 'landscape');
            //send it by mail
            $dataSP = array('email' => trim($spea['email']), 'name' => $spea['name'], 'subject' => 'Speaker Certificate');
            if($spea['email']) {
                Mail::send('mail', $dataSP, function($message)use($dataSP, $pdfSP) {
                    $message->to($dataSP["email"], $dataSP['name'])
                            ->from('certificates@energize-sa.com', 'Energize')
                            ->subject($dataSP["subject"])
                            ->attachData($pdfSP->output(), "SpeakerCertificate.pdf");
                });
            }
        }
        // set 'sent' to true
        Event::where('id', $id)->update(['sent' => true]);
        return redirect('admin/events');
    }
}
