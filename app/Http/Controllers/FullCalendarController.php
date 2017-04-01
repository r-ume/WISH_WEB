<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Calendar as Calendar;
use \Auth as Auth;
use App\Event;
use App\Wishtimes;

class FullCalendarController extends Controller{

	public function index(){

	    $user = Auth::user();
        $events = [];

        $events[] = Calendar::event(
            "BBQ", // event title
            true, // full day event
            new \DateTime('2017-04-16'), // start time
            new \DateTime('2017-04-16'), // end time
            1
        );

        $events[] = Calendar::event(
            "RA 会議",
            true,
            new \DateTime('2017-04-03'),
            new \DateTime('2017-04-03'),
            2
        );

        $events[] = Calendar::event(
            "5階と9階の合コン",
            true,
            new \DateTime('2017-04-04'),
            new \DateTime('2017-04-04'),
            3
        );

        $calendar = Calendar::addEvents($events)
                ->setOptions([
                    'firstDay' => 1
                ]);

        $events = Event::orderBy('created_at', 'DESC')->get();

//        $joiningEvents = Event::orderBy

        return view('calendar.index', compact('calendar', 'user', 'events'));
    }
}