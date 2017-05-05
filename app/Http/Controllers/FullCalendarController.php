<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Calendar as Calendar;
use \Auth as Auth;

use App\Event;
use App\Wishtimes;

class FullCalendarController extends Controller{
    
    protected $allEvents;
    protected $recentEvents;
    protected $numOfDisplayedEvents;
    
    public function __construct(){
        $this->numOfDisplayedEvents = 4;
        $this->allEvents = Event::all();
        $this->recentEvents = Event::orderBy('created_at', 'DESC')->take($this->numOfDisplayedEvents)->get();
    }
    
    public function index(){
        $user = Auth::user();
        $calendarEvents =[];
        $allEvents = $this->allEvents;
        $recentEvents = $this->recentEvents;
        
        foreach($allEvents as $event){
            $calendarEvents[] = Calendar::event(
                $event->title,
                true,
                $event->created_at,
                $event->created_at,
                $event->id
            );
        }
        
        $calendar = Calendar::addEvents($calendarEvents)
            ->setOptions([
                'firstDay' => 1
            ]);
        
        return view('calendar.index', compact('calendar', 'user', 'calendarEvents', 'recentEvents'));
    }
}