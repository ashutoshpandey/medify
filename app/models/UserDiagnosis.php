<?php

class UserDiagnosis extends Eloquent{

	protected $table = 'user_diagnosis';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}