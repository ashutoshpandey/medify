<?php

class ExpertPasswordChange extends Eloquent{

	protected $table = 'expert_password_changes';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}