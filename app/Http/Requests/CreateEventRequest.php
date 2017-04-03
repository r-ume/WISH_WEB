<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEventRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules(){
        return [
            'title' => 'required|unique|max:30',
            'description' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'isAllDay' => 'required',
            'max_people' => 'required',
        ];
    }
}
