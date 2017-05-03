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

    protected $user;
    protected $users;
    protected $events;
    protected $tweets;
    protected $categories;
    protected $listedCategories;
    protected $paginationNum;

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->users = User::get()->pluck('full_name', 'id');
        $this->events = Event::with('creator', 'categories')->orderBy('created_at', 'DESC')->get();
        $this->tweets = Tweet::orderBy('created_at', 'DESC')->get();
        $this->categories = Category::all();
        $this->pluckedCategories = Category::pluck('name', 'id');
        $this->paginationNum = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $maxEvents = Event::count();
        $paginationNum = $this->paginationNum;
        $pageNum = floor($maxEvents / $paginationNum);
        $events = Event::orderBy('created_at', 'DESC')->paginate($paginationNum);
        $user = $this->user;
        $categories = $this->categories;
        $tweets = $this->tweets;
    
        return view('events.index', compact('pageNum', 'events', 'user', 'categories', 'tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $user = $this->user;
        $users = $this->users;
        $tweets = $this->tweets;
        $categories = $this->categories;
        $pluckedCategories = $this->pluckedCategories;
        return view('events.create', compact('user', 'users', 'tweets', 'categories', 'pluckedCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateEventRequest $request){
        $request['start_at'] = time($request['start_at']);
        $request['end_at'] = time($request['end_at']);

        $event = Auth::user()->events()->create($request->all());
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
        $categories = $event->categories;
        $user = $this->user;

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
        $user = $this->user;
        $users = $this->users;
        $joiningUsers = $event->UsersList;
        $categories = $this->categories;
        $associatedCategories = $event->AssociatedCategories;
        $pluckedCategories = $this->pluckedCategories;
        $tweets = $this->tweets;
        
        return view('events.edit', compact('event', 'pluckedCategories', 'user', 'tweets', 'users', 'categories', 'associatedCategories', 'joiningUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateEventRequest $request, Event $event){
        $event->update($request->all());

        $input_categories = $request->input('categories_list');
        if($input_categories) $event->categories()->sync($request->input('categories_list'));
        
        $input_joiningUsers = $request->input('users_list');
        if($input_joiningUsers) $event->joiningUsers()->sync($request->input('users_list'));
        
        $input = Input::all();
        $input_image = Input::file('image');
        if($input_image){
            $imageName = $input['image']->getClientOriginalName();
            $path = public_path('uploads/'.$imageName);
            Image::make($input_image->getRealPath())->resize(468, 468)->save($path);
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
