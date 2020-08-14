<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            "content" => 'required',
            "point_vote" => 'filled'
        ]);
        $answer = Answer::create($request->all());
       if($answer)
           return [ "status" => "true","id" => $answer->id ];
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
    public function update(Request $request, $id)
    {
        $update = Answer::where('id', $id)->update([
            'content' => $request['content']
        ]);
        // if($type == "point_vote"){          
        //     $this->validate($request, [
        //     'point_vote' => 'required',
        //     'users_id' => 'required',
        //     ]);
        // if($request->point_vote == "up"){
        //     $point_vote = $answers->first();
        //     $point_vote = $answer->votes;
        //     $point_vote++;
        //     $answers->votes = $point_vote;
        //     $answers->save();
        // }
        // if($request->point_vote == "down"){
        //     $point_vote = $answers->first();
        //     $point_vote = $answer->votes;
        //     $point_vote--;
        //     $answers->votes = $point_vote;
        //     $answers->save();
        // }
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
