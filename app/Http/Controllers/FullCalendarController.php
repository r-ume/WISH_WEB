<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Calendar as Calendar;

class FullCalendarController extends Controller {

	public function index(){

        $events = [];

        $events[] = Calendar::event(
            "Event one", // event title
            true, // full day event
            '2017-01-01', // start time
            '2017-01-02', // end time
            0
        );

        $calendar = Calendar::addEvents($events)
                ->setOptions([
                    'firstDay' => 1
                ]);

        return view('calendar.index', compact('calendar'));
    }
}
