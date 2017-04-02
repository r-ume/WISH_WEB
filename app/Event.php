<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'image'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_events', 'event_id', 'category_id')->withTimestamps();
    }

    public function getCategoriesListAttribute(){
        return $this->categories->lists('id');
    }

    public function usersCount(){
        return $this->belongsToMany('App\User', 'events_users')
            ->selectRaw('count(users.id) as aggregate')
            ->groupBy('event_id');
    }

    public function getUsersCountAttribute(){
        if ( ! array_key_exists('usersCount', $this->relations)) $this->load('usersCount');

        $related = $this->getRelation('usersCount')->first();

        return ($related) ? $related->aggregate : 0;
    }
}
