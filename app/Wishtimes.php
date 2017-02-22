<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishtimes extends Model {

	protected $table = 'wishtimes';

    protected $fillable = ['title', 'content'];
    
    public function user(){
        return $this->hasMany('App\User')->withTimestamps();
    }
}