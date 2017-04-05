<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->feeds = Feed::all();
        $this->categories = Category::all();
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
