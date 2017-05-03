<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishtimes extends Model {
    
    protected $table = 'wishtimes';

    protected $fillable = ['title', 'content', 'image', 'isApproved'];
    
    public function author(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_wishtimes', 'wishtimes_id', 'category_id');
    }
    
    public function getAssociatedCategoriesAttribute(){
        return $this->categories->pluck('id')->all();
    }
}