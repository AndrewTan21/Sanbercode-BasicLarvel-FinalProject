<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // protected $fillable  = ['content','point_vote','reply_id','page_id','users_id'];
    protected $guarded = [];
    protected $table = 'answers';
    protected $dates = ['created_at', 'updated_at'];
    public function replies() {
        return $this->hasMany('App\Answer','id','reply_id', 'question_id');
    }

    // public function tags() {
    //     return $this->belongsToMany('App\Tag', 'question_tag', 'question_id', 'tag_id');
    // }
}
