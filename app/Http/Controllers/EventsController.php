<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;

use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;

use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;

class EventsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = Event::all();
        return view('events.index', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateEventRequest $request)
	{
		$event = Event::create($request->all());

        $input = Input::all();
        $image = Input::file('image');
        $imageName = $input['image']->getClientOriginalName();
        $path = public_path('uploads/'.$imageName);
        Image::make($image->getRealPath())->resize(468, 468)->save($path);
        $event->image = 'uploads/'.$imageName;
        $event->save();

        return redirect('events');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Event $event)
	{
		return view('events.show', compact('event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Event $event)
	{
		return view('events.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateEventRequest $request, Event $event)
	{
		$event->update($request->all());
        
        return redirect('events');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Event $event)
	{
		$event->delete();

        return redirect('events');
	}

}
