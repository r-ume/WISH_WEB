<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Wishtimes;
use App\Category;
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
	    $categories = Category::lists('name', 'id');
		return view('wishtimes.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateWishTimesRequest $request)
	{
        $wishtimes = \Auth::user()->wishtimes()->create($request->all());
        
        dd($request->input('categories_list'));
        $wishtimes->categories()->attach($request->input('categories_list'));
        
        \Session::flash('flash_message', 'Your wishtimes have been created');
        
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
        $categories = Category::lists('name', 'id');
        return view('wishtimes.edit', compact('wishtimes', 'categories'));
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
        
//        dd($request->input('categories_list'));
        $wishtimes->categories()->attach($request->input('categories_list'));
        
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
