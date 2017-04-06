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
    
        return view('semantic.index', compact('image'));
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
