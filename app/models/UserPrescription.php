<?php

class UserPrescription extends Eloquent{

	protected $table = 'user_prescriptions';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}