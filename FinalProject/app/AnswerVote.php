<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    protected $fillable = ['answer_id','user_id','vote'];
   protected $table = "answer_user_vote";
   public $timestamps = false;
}
