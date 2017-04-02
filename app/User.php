<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'sex', 'language_id', 'floor', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
    
    public function wishtimes(){
        return $this->hasMany('App\Wishtimes');
    }
    
    public function tweets(){
        return $this->hasMany('App\Tweet');
    }
    
    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withTimestamps();
    }
    
    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    // many to many relationships
    public function events_mm(){
        return $this->belongsToMany('App\User', 'events_users', 'user_id', 'event_id')->withTimestamps();
    }

    public function eventsCount(){
        return $this->belongsToMany('App\Event')
            ->selectRaw('count(users.id) as aggregate')
            ->groupBy('event_id');
    }

    public function getUsersCountAttribute(){
        if ( ! array_key_exists('usersCount', $this->relations)) $this->load('usersCount');

        $related = $this->getRelation('usersCount')->first();

        return ($related) ? $related->aggregate : 0;
    }
}
