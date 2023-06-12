<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Histories;
use Illuminate\Support\Carbon;

class HistoryController extends Controller
{
    //

    // public function registerEvent(Request $request){
    //     History::insert([
    //         'event_organizer' => $request->event_organizer,
    //         'event_name' =>  $request->event_name,
    //         'event_place' => $request->event_place,
    //         'event_date' => $request->event_date,
    //         'event_time' => $request->event_time
    //     ]);
    //     //mengarahkan pengguna kembali ke halaman sebelumnya setelah daftar event
    //     return redirect()->back();
    // }

    public function regist(Request $request, $eventId){
        $eventDate = Event::find($eventId)->event_date;

        // create a new event history
        $registEvent = new Histories();
        $registEvent->event_id = $eventId;
        $registEvent->event_date = $eventDate;
        $registEvent->save();

        //ini harusnya direct ke 
        return redirect('/history')->with('success', 'Event register successful!');
    }

    public function showHistory(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        //ini masih blm bisa soalnya klo eventnya bulan Juni, dia masi diitung 0 event yg held in June
        $thisMonthEvent = Histories::whereMonth('event_date', $currentMonth)
            ->whereYear('event_date', $currentYear)
            ->count();

        $thisMonthRegistration = Histories::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        $totalevent = Histories::count();
        $histories = Histories::all();

        $allData = [
            'totalevent' => $totalevent,
            'histories' => $histories,
            'thisMonthEvent' => $thisMonthEvent,
            'thisMonthRegistration' => $thisMonthRegistration,
        ];

        return view('eventhistory', $allData);
    }
}