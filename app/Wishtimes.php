<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishtimes extends Model {

	protected $table = 'wishtimes';

    protected $fillable = ['title', 'content', 'image', 'isApproved'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_wishtimes', 'wishtimes_id', 'category_id');
    }
    
    public function getCategoriesListAttribute(){
        return $this->categories->lists('id');
    }
}