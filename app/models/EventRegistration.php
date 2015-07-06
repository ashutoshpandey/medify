<?php

class EventRegistration extends Eloquent{

	protected $table = 'event_registrations';

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}