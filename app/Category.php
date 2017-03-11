<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
    
    protected $fillable = ['name'];
    
    public function events(){
        return $this->belongsToMany('App\Event', 'categories_events', 'category_id', 'event_id')->withTimestamps();
    }
    
    public function feeds(){
        return $this->belongsToMany('App\Feed')->withTimestamps();
    }
    
    public function wishtimes(){
        return $this->belongsToMany('App\Wishtimes')->withTimestamps();
    }
}
