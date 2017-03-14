<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SemanticController extends Controller {

    public function semantic(){
        return view('semantic.index');
    }

    public function semanticLogin(){
        return view('semantic.login');
    }
}
