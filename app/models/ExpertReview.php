<?php

class ExpertReview extends Eloquent{

	protected $table = 'expert_reviews';

    public function expert(){
        return $this->belongsTo('Expert', 'expert_id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}