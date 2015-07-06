<?php

class ExpertRecommendation extends Eloquent{

	protected $table = 'expert_recommendations';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }
}