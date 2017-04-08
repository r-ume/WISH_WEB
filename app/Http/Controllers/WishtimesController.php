<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Wishtimes;
use App\Category;
use App\Tweet;
use App\Http\Requests\CreateWishTimesRequest;

use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;
use \Auth as Auth;

class WishtimesController extends Controller {

    protected $user;
    protected $wishtimes;
    protected $listedCategories;
    protected $categories;
    protected $tweets;
    protected $paginationNum;

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->wishtimes = Wishtimes::orderBy('created_at', 'DESC')->get();
        $this->listedCategories = Category::lists('name', 'id');
        $this->categories = Category::all();
        $this->tweets = Tweet::orderBy('created_at', 'DESC')->get();
        $this->paginationNum = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $paginationNum = $this->paginationNum;
        $allWishtimes = $this->wishtimes;
        $wishtimesNum = $allWishtimes->count();
        $pageNum = floor($wishtimesNum / $paginationNum);

        $user = $this->user;
        $role = $this->_findRole($user);
        if ($role == 'RA'){
            $wishtimes = Wishtimes::orderBy('created_at', 'DESC')->paginate($paginationNum);
        }else if($role == 'resident'){
            $wishtimes = Wishtimes::orderBy('created_at', 'DESC')
                ->orWhere('isApproved', '=', 2)
                ->orWhere('isApproved', '=', 0)
                ->paginate($paginationNum);
        }

        $categories = $this->categories;
        $tweets = $this->tweets;

        return view('wishtimes.index', compact('user', 'wishtimes', 'categories', 'tweets', 'pageNum', 'role'));
    }

    public function usersIndex(){
        $paginationNum = $this->paginationNum;
        $allWishtimes = $this->wishtimes;
        $wishtimesNum = $allWishtimes->count();
        $pageNum = floor($wishtimesNum / $paginationNum);

        $user = $this->user;
        $wishtimes = Wishtimes::where('user_id', $user->id)->paginate($paginationNum);
        $categories = $this->categories;
        $tweets = $this->tweets;

        return view('wishtimes.index', compact('user', 'wishtimes', 'categories', 'tweets', 'pageNum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $user = $this->user;
        $listedCategories = $this->listedCategories;
        $categories = $this->categories;
        $tweets = $this->tweets;
        return view('wishtimes.create', compact('user', 'categories', 'listedCategories', 'tweets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateWishTimesRequest $request){
        $wishtimes = \Auth::user()->wishtimes()->create($request->all());
        $wishtimes->isApproved = 0;

        $input = Input::all();
        $image = Input::file('image');

        if($image){
            $imageName = $input['image']->getClientOriginalName();
            $path = public_path('uploads/'.$imageName);
            Image::make($image->getRealPath())->resize(468, 468)->save($path);
            $wishtimes->image = 'uploads/'.$imageName;
            $wishtimes->save();
        }

        $categories = $request->input('categories_list');

        if($categories){
            $wishtimes->categories()->sync($categories);
        }

        return redirect('wishtimes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Wishtimes $wishtimes){
        $user = $this->user;
        $role = $this->_findRole($user);
        $tweets = $this->tweets;
        $listedCategories = $this->listedCategories;
        $categories = $this->categories;
        return view('wishtimes.show', compact('wishtimes', 'user', 'tweets', 'role', 'listedCategories', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Wishtimes $wishtimes){
        $tweets = $this->tweets;
        $listedCategories = $this->listedCategories;
        $user = $this->user;
        return view('wishtimes.edit', compact('wishtimes', 'listedCategories', 'user', 'tweets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Wishtimes $wishtimes, CreateWishTimesRequest $request){
        $wishtimes->update($request->all());
        $input_categories = $request->input('categories_list');
        if($input_categories){
            $wishtimes->categories()->sync($request->input('categories_list'));
        }

        $input = Input::all();
        $input_image = Input::file('image');

        if($input_image){
            $imageName = $input['image']->getClientOriginalName();
            $path = public_path('uploads/'.$imageName);
            Image::make($input_image->getRealPath())->resize(468, 468)->save($path);
            $wishtimes->image = 'uploads/'.$imageName;
            $wishtimes->save();
        }

        return redirect('wishtimes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Wishtimes $wishtimes){
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

    protected function _disapproveWishtimes(Wishtimes $wishtimes){
        if($wishtimes->isApproved == 0){
            $wishtimes->isApproved = 1;
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
