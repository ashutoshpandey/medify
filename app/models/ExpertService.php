<?php

class ExpertService extends Eloquent{

	protected $table = 'expert_services';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}