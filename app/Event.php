<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'image', 'start_at', 'end_at', 'isAllDay', 'max_people'];

    public function creator(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function joiningUsers(){
        return $this->belongsToMany('App\User', 'events_users', 'event_id', 'user_id')->withTimestamps();
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

    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_events', 'event_id', 'category_id')->withTimestamps();
    }

    public function getAssociatedCategoriesAttribute(){
        return $this->categories->pluck('id')->all();
    }

    public function getUsersListAttribute(){
        return $this->joiningUsers->pluck('id')->all();
    }
}
