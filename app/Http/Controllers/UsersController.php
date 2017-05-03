<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Event;

use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;
use \Auth as Auth;

class UsersController extends Controller {

    protected $user;
    protected $users;
    protected $events;

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->users = User::all();
        $this->events = Event::with('creator')->get();
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
        $events = $this->events;
        return view('users.myprofile', compact('user', 'events'));
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
