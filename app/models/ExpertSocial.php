<?php

class ExpertSocial extends Eloquent{

	protected $table = 'expert_social_profiles';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}