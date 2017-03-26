<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

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
}
