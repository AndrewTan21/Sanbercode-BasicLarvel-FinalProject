<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    protected $table = 'questions';
    
    public function tags() {
        return $this->belongsToMany('App\Tag', 'question_tag', 'question_id', 'tag_id');
    }

    public function questions_comment() {
        return $this->hasMany('App\QuestionComment', 'profile_id');
    }

    public function answers() {
        return $this->hasMany('App\Answer', 'profile_id');
    }
}
