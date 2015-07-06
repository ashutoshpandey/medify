<?php

class ExpertLocation extends Eloquent{

	protected $table = 'expert_locations';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}