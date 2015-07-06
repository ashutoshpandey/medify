<?php

class Event extends Eloquent{

	protected $table = 'events';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}