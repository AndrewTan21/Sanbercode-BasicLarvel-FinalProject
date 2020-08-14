<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable  = ['content','point_vote','reply_id','page_id','users_id'];
    protected $dates = ['created_at', 'updated_at'];
    public function replies()
   {
       return $this->hasMany('App\Answer','id','reply_id');
   }
}
