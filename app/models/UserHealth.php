<?php

class UserHealth extends Eloquent{

	protected $table = 'user_healths';

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}