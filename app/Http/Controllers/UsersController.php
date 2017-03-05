<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use \Input as Input;
use Intervention\Image\ImageManagerStatic as Image;


class UsersController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'show', 'edit', 'update', 'upload']);
    }
    
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
	    $user = \Auth::user();
		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = \Auth::user();
        return view('users.edit', compact('user'));
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

	public function upload()
    {
        $user = \Auth::user();
        $input = Input::all();
        
        $image = Input::file('fileName');
        $fileName = $input['fileName']->getClientOriginalName();
        $path = public_path('uploads/' . $fileName);
        Image::make($image->getRealPath())->resize(468, 468)->save($path);
        $user->image = 'uploads/'.$fileName;
        $user->save();

        return view('users.show', compact('user'));
    }
}
