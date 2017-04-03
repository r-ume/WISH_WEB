<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Category;
use App\Tweet;
use App\User;

use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;

use \Auth as Auth;
use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;

class EventsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $paginationNum = 3;
        $allEvents = Event::all();
        $eventsNum = $allEvents->count();
        $pageNum = floor($eventsNum / $paginationNum);
        
        $user = \Auth::user();
        $events = Event::orderBy('created_at', 'DESC')->paginate($paginationNum);
        $categories = Category::all();
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
    
        return view('events.index', compact('events', 'user', 'pageNum', 'categories', 'tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $user = Auth::user();
    
        $tweets = Tweet::all();
        $categories = Category::lists('name', 'id');
        $users = User::get()->lists('full_name', 'id');
        return view('events.create', compact('categories', 'user', 'tweets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateEventRequest $request){
        $request['start_at'] = time($request['start_at']);
        $request['end_at'] = time($request['end_at']);

        $event = \Auth::user()->events()->create($request->all());
        if($request->input('categories_list')){
            $event->categories()->sync($request->input('categories_list'));
        }

        if($request->input('users_list')){
            $event->joiningUsers()->sync($request->input('users_list'));
        }

        $input = Input::all();
        $image = Input::file('image');
        if($image){
            $imageName = $input['image']->getClientOriginalName();
            $path = public_path('uploads/'.$imageName);
            Image::make($image->getRealPath())->resize(468, 468)->save($path);
            $event->image = 'uploads/'.$imageName;
            $event->save();
        }

        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Event $event){
        $tweets = Tweet::all();
        $categories = Category::all();
        $user = \Auth::user();

        $attendance = false;
        foreach($event->joiningUsers as $attend_user){
            if($user->id == $attend_user->id){
                $attendance = true;
            }
        }

        return view('events.show', compact('event', 'tweets', 'categories', 'user', 'attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Event $event){
        $user = Auth::user();
        $categories = Category::lists('name', 'id');
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        $users = User::get()->lists('full_name', 'id');
        return view('events.edit', compact('event', 'categories', 'user', 'tweets', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateEventRequest $request, Event $event){
        $event->update($request->all());

        if($request->input('categories_list')){
            $event->categories()->sync($request->input('categories_list'));
        }

        if($request->input('categories_list')){
            $event->categories()->sync($request->input('categories_list'));
        }

        $input = Input::all();
        $image = Input::file('image');
        if($image){
            $imageName = $input['image']->getClientOriginalName();
            $path = public_path('uploads/'.$imageName);
            Image::make($image->getRealPath())->resize(468, 468)->save($path);
            $event->image = 'uploads/'.$imageName;
            $event->save();
        }

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Event $event){
        $event->delete();

        return redirect('events');
    }

    public function attend(Event $event, Request $request){
        if($event){
            $event->joiningUsers()->attach((array)$request->input('user_id'));
        }

        return redirect('events');
    }
}
