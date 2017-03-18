<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $table = 'tweets';

    protected $fillable = ['tweet'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
