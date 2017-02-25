<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {
    
    protected $table = 'feeds';
    
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    
    public function user(){
        return $this->belongsTo('App\User')->withTimestamps();
    }
}
