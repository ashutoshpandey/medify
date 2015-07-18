<?php

class Appointment extends Eloquent{

	protected $table = 'appointments';

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}