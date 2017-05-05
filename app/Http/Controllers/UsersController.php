<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\User;
use App\Event;
use App\Wishtimes;
use App\Feed;

use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;
use \Auth as Auth;

class UsersController extends Controller {

    protected $user;
    protected $users;
    protected $feeds;
    protected $events;
    protected $wishtimes;
    protected $paginationNum;

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->users = User::all();
        $this->paginationNum = 6;
        $this->events = Event::with('creator', 'categories')->get();
        $this->feeds = Feed::with('author', 'categories')->get();
        $this->wishtimes = Wishtimes::with('author', 'categories')->get();
    }

    public function index(){
        $user = $this->user;
        $users = $this->users;
        return view('users.index', compact('user', 'users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(){
        $user = $this->user;
        return view('users.show', compact('user'));
    }

    public function myprofile(){
        $user = $this->user;
        $paginationNum = $this->paginationNum;
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/myprofile';
        
        $timeline = new Collection();
    
        $feeds = $this->feeds;
        $events = $this->events;
        $wishtimes = $this->wishtimes;
        
        foreach($wishtimes as $wishtime){
            $timeline->push($wishtime);
        }
        foreach($events as $event){
            $timeline->push($event);
        }
        foreach($feeds as $feed){
            $timeline->push($feed);
        }
        
        $timeline = $timeline->sortByDesc('created_at');
        $initial_timeline = $timeline->sortByDesc('created_at');
    
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $displayedItem = $timeline->slice($currentPage * $paginationNum, $paginationNum)->all();
        $timeline = new LengthAwarePaginator($displayedItem, count($timeline), $paginationNum);
        $timeline->setPath($host);
    
        $initial_timeline = $initial_timeline->slice(0, $paginationNum + 1)->all();
        
        return view('users.myprofile', compact('user', 'timeline', 'initial_timeline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(){
        $user = $this->user;
        return view('users.edit', compact('user'));
    }

    public function upload(){
        $user = $this->user;
        $input = Input::all();

        $image = Input::file('fileName');
        $fileName = $input['fileName']->getClientOriginalName();
        $path = public_path('uploads/' . $fileName);
        Image::make($image->getRealPath())->resize(468, 468)->save($path);
        $user->image = 'uploads/'.$fileName;
        $user->save();

        return view('users.show', compact('user'));
    }
}
