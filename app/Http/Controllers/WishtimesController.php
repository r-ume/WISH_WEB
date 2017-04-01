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
        if ($this->_findRole($user) == 'RA'){
            $wishtimes = Wishtimes::orderBy('created_at', 'DESC')->paginate($paginationNum);
        }else if($this->_findRole($user) == 'resident'){
            $wishtimes = Wishtimes::orderBy('created_at', 'DESC')
                ->orWhere('isApproved', '=', 2)
                ->orWhere('isApproved', '=', 0)
                ->paginate($paginationNum);
        }
        
        $categories = Category::all();
        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        
        return view('wishtimes.index', compact('user', 'wishtimes', 'categories', 'tweets', 'pageNum'));
	}
	
	public function usersIndex(){
        $paginationNum = 3;
        $allWishtimes = Wishtimes::all();
        $wishtimesNum = $allWishtimes->count();
        $pageNum = floor($wishtimesNum / $paginationNum);
        
        $user = \Auth::user();
        $wishtimes = Wishtimes::where('user_id', '=', $user->id)->paginate($paginationNum);
        
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
        $user = \Auth::user();
        
        $categories = Category::lists('name', 'id');
        $allCategories = Category::all();
        $tweets = Tweet::all();
        return view('wishtimes.create', compact('user', 'categories', 'allCategories', 'tweets'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateWishTimesRequest $request)
	{
        $wishtimes = \Auth::user()->wishtimes()->create($request->all());
        $wishtimes->isApproved = 0;
        
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
        $tweets = Tweet::all();
        $categories = Category::lists('name', 'id');
        $user = \Auth::user();
        return view('wishtimes.edit', compact('wishtimes', 'categories', 'user', 'tweets'));
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
	
    protected function _approveWishtimes(Wishtimes $wishtimes){
        if($wishtimes->isApproved == 0){
            $wishtimes->isApproved = 2;
            $wishtimes->save();
        }
        
        return redirect('wishtimes');
    }
    
	protected function _findRole($user){
	    foreach($user->roles as $role){
	        $role_name = $role->role;
        }
        
        return $role_name;
    }
}
