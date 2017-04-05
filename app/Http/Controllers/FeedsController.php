<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFeedRequest;

use App\Feed;
use App\Category;
use App\Tweet;
use \Auth as Auth;

class FeedsController extends Controller {

    protected $user;
    protected $feeds;
    protected $categories;
    protected $tweets;
    protected $paginationNum;
    protected $listedCategories;

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->feeds = Feed::all();
        $this->categories = Category::all();
        $this->listedCategories = Category::lists('name', 'id');
        $this->tweets = Tweet::all();
        $this->paginationNum = 5;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $user = $this->user;
        $feeds = $this->feeds;
        $categories = $this->categories;
        $tweets = $this->tweets;
        $paginationNum = $this->paginationNum;
        $allFeeds = count($feeds);
        $pageNum = floor($allFeeds / $paginationNum);

        return view('feeds.index', compact('user', 'feeds', 'categories', 'tweets', 'pageNum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $user = $this->user;
        $categories = $this->categories;
        $tweets = $this->tweets;
        $listedCategories = $this->listedCategories;
        return view('feeds.create', compact('user', 'categories', 'tweets', 'listedCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateFeedRequest $request){
        $feed = Auth::user()->feed()->create($request->all());
        $feed->categories()->sync($request->input('categories_list'));
        return redirect('feeds');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $feed
     * @return Response
     */
    public function show(Feed $feed)
    {
        $user = $this->user;
        $tweets = $this->tweets;
        return view('feeds.show', compact('feed', 'user', 'tweets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $feed
     * @return Response
     */
    public function edit(Feed $feed){
        $user = $this->user;
        $tweets = $this->tweets;
        $listedCategories = $this->listedCategories;
        return view('feeds.edit', compact('feed', 'user', 'tweets', 'listedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  object  $feed
     * @return Response
     */
    public function update(Feed $feed, CreateFeedRequest $request){
        $feed->update($request->all());

        if(is_null($request->input('categories_list'))){
            $feed->categories()->detach();
        }else{
            $feed->categories()->sync($request->input('categories_list'));
        }
        return redirect('feeds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $feed
     * @return Response
     */
    public function destroy(Feed $feed){
        $feed->delete();

        return redirect('feeds');
    }

}