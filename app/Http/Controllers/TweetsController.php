<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tweet;
use Request;
use App\Http\Requests\CreateTweetRequest;

class TweetsController extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

	    $paginationNum = 5;
        $user = \Auth::user();
        $tweets = Tweet::orderBy('created_at', 'DESC')->paginate($paginationNum);

        $allTweets = Tweet::all();
        $tweetsNum = $allTweets->count();
        $pageNum = floor($tweetsNum / $paginationNum);

        return view('tweets.index', compact('tweets', 'user', 'pageNum'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tweets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateTweetRequest $request)
	{
        $tweet = \Auth::user()->tweets()->create($request->all());

        return redirect('tweets');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Tweet $tweet){
        return view('tweets.show', compact('tweet'));
	}
    
	private function createTweet(CreateTweetRequest $request){
        $tweet = Tweet::create($request->all());

        return $tweet;
    }
}
