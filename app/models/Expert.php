<?php

class Expert extends Eloquent{

	protected $table = 'experts';

    public function appointments(){
        return $this->hasMany('Appointment', 'expert_id');
    }
}