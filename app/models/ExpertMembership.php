<?php

class ExpertMembership extends Eloquent{

	protected $table = 'expert_memberships';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}