<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentAnswer extends Model
{
    protected $guarded = [];
    //protected $fillable = ['answer_id', 'users_id', 'content'];
    protected $table = 'comment_answers';
    public function questions(){
        return $this->belongsTo('App\Question');
    }
    public function answers(){
        return $this->belongsTo('App\Answer');
    }

}
