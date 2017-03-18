<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
    
    protected $fillable = ['role'];
    
    public function users(){
        return $this->belongsToMany('User', 'role_user', 'role_id', 'user_id')->withTimestamps();
    }
}
