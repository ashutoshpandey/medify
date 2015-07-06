<?php

class ExpertAchievement extends Eloquent{

	protected $table = 'expert_achievements';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}