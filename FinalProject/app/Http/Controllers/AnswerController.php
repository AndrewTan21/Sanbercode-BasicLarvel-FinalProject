<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerVote;
use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page_id)
    {
        $answers = Answer::where('page_id',$pageId)->get();
        $answersData = []

        foreach ($answers as $key) {
            $user = User::find($key->users_id);
            $name = $user->name;
            $replies = $this->replies($key->id);
            $photo = $user->first()->photo_url;
            // dd($photo->photo_url);
            $reply = 0;
            $vote = 0;
            $voteStatus = 0;
            $spam = 0;
            if(Auth::user()){
                $voteByUser = AnswerVote::where('answer_id',$key->id)->where('user_id',Auth::user()->id)->first();             
                if($voteByUser){
                    $vote = 1;
                    $voteStatus = $voteByUser->vote;
                }
            }          
            if(sizeof($replies) > 0){
                $reply = 1;
            }
                   
        }
        $collection = collect($answersData);
        return $collection->sortBy('votes');
    }
    protected function replies($answerid)
    {
        $answers = Answer::where('reply_id',$answerId)->get();
        $replies = [];
        foreach ($answers as $key) {
            $user = User::find($key->users_id);
            $name = $user->name;
            //$photo = $user->first()->photo_url;
            $vote = 0;
            $voteStatus = 0;
            //$spam = 0;        
            if(Auth::user()){
                $voteByUser = CommentVote::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
                if($voteByUser){
                    $vote = 1;
                    $voteStatus = $voteByUser->vote;
                }
            }
        $collection = collect($replies);
        return $collection->sortBy('votes');
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'reply_id' => 'filled',
            'page_id' => 'filled',
            'users_id' => 'required',
            ]);
        $answer = Answer::create($request->all());
       
        if($answer)
           return [ "status" => "true","answerid" => $answer->id ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $answerid, $type)
    {
        if  ($type == "vote"){          
            $this->validate($request, [
            'vote' => 'required',
            'users_id' => 'required',
            ]);

            $answers = Answer::find($answerid);

            $data = [
                "answer_id" => $answerid,
                'vote' => $request->vote,
                'user_id' => $request->users_id,
            ];

            if($request->vote == "up"){
                $answer = $answers->first();
                $vote = $answer->votes;
                $vote++;
                $answers->votes = $vote;
                $answers->save();
            }
            if($request->vote == "down"){
                $answer = $answers->first();
                $vote = $answer->votes;
                $vote--;
                $answers->votes = $vote;
                $answers->save();
            }
            if(AnswerVote::create($data))
               return "true";
       }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
