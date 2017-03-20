<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Wishtimes;
use App\Category;
use App\Tweet;
use App\Http\Requests\CreateWishTimesRequest;

use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;

class WishtimesController extends Controller {

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
	    $paginationNum = 3;
        $allWishtimes = Wishtimes::all();
        $wishtimesNum = $allWishtimes->count();
        $pageNum = floor($wishtimesNum / $paginationNum);
        
        $user = \Auth::user();
        $wishtimes = Wishtimes::orderBy('created_at', 'DESC')->paginate($paginationNum);
        $categories = Category::all();
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        
        return view('wishtimes.index', compact('user', 'wishtimes', 'categories', 'tweets', 'pageNum'));
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
        
        $input = Input::all();
        $image = Input::file('image');
        $imageName = $input['image']->getClientOriginalName();
        $path = public_path('uploads/'.$imageName);
        Image::make($image->getRealPath())->resize(468, 468)->save($path);
        $wishtimes->image = 'uploads/'.$imageName;
        $wishtimes->save();
        
        $wishtimes->categories()->sync($request->input('categories_list'));
        
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
        $user = \Auth::user();
        $tweets = Tweet::all();
        return view('wishtimes.show', compact('wishtimes', 'user', 'tweets'));
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
        
        $wishtimes->categories()->sync($request->input('categories_list'));
        
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
