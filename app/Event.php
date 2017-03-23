<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'image'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_events', 'event_id', 'category_id');
    }

    public function getCategoriesListAttribute(){
        return $this->categories->lists('id');
    }
}
