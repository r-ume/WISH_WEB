<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Language extends Model {

	protected $table = 'languages';

    protected $fillable = 'language';
    
    public function users(){
        $this->hasMany('App\User')->withTimestamps();
    }

}
