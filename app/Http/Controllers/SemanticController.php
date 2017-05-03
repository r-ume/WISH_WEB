<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use \App\Category;
use \App\Tweet;
use \App\Event;

class SemanticController extends Controller {

    public function semantic(){
        
        $directory = 'uploads/backgrounds';
        $allImages = File::allFiles($directory);
        
        $key = array_rand($allImages);
        $image = $allImages[$key];
        
        $quotes = [
            '世界は、広いよ。最初の1歩はWISHから。',
            '楽しい大学生活が、今ここから始まる。',
            '一生の友達は、いつだって寮でできるもの。'
        ];
        
        $quote_key = array_rand($quotes);
        $quote = $quotes[$quote_key];
    
        return view('semantic.index', compact('image', 'quote'));
    }

    public function semanticLogin(){
        return view('semantic.login');
    }

    public function partial_index(){
        $events = Event::all();
        $user = \Auth::user();
        $categories = Category::all();
        $tweets = Tweet::all();
        return view('semantic.partial_index', compact('user', 'categories', 'tweets', 'events'));
    }
}
