<?php

class UserPasswordChange extends Eloquent{

	protected $table = 'user_password_changes';

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}