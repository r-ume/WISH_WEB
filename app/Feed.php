<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {
    
    protected $table = 'feeds';
    
    protected $fillable = ['title', 'content'];
    
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_feeds', 'feed_id', 'category_id')->withTimestamps();
    }
    
    public function creator(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getCategoriesListAttribute(){
        return $this->categories->lists('id');
    }
}
