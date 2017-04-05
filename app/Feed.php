<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {
    
    protected $table = 'feeds';
    
    protected $fillable = ['title', 'content'];
    
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_feeds', 'feed_id', 'category_id')->withTimestamps();
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
