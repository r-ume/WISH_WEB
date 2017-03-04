<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Wishtimes;
use App\Http\Requests\CreateWishTimesRequest;

class WishtimesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create', 'edit', 'update', 'destroy']);
    }
    
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wishtimes = Wishtimes::all();
        
        return view('wishtimes.index', compact('wishtimes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('wishtimes.create', compact('user_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateWishTimesRequest $request)
	{
	    $newWishtimes = new Wishtimes($request->all());
        
        \Auth::user()->wishtimes()->save($newWishtimes);
        
        return redirect('wishtimes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Wishtimes $wishtimes)
	{
		return view('wishtimes.show', compact('wishtimes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Wishtimes $wishtimes)
	{
		return view('wishtimes.edit', compact('wishtimes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Wishtimes $wishtimes, CreateWishTimesRequest $request)
	{
		$wishtimes->update($request->all());
        
        return redirect('wishtimes');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Wishtimes $wishtimes)
	{
		$wishtimes->delete();
        
        return redirect('wishtimes');
	}

}
