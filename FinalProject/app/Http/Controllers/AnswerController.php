<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Tag;
use DB;
use Auth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question)
    {
        $answer = new Answer;
        $answer->users_id = request()->user()->uuid;
        $answer->question_id = $question->uuid;
        $answer->content = request('content');
        $answer->save();

        return redirect('question/'.$question->uuid)
                    ->with('success', 'Jawaban Anda Berhasil Disimpan');

        // $request->validate([
        //     "content" => 'required',
        //     "point_vote" => 'required',
        //     "tag" => 'required'
        // ]);

        // $answer = Answer::create([
        //     'content' => $request->content,
        //     'question_id' => $id,
        //     'users_id' => Auth::id()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $data['question'] = $answer->question;
        $data['answer'] = $answer;
        return view('answer.edit, $data');

        // $question = DB::table('questions')->where('id', $id)->first();
        // $question = Question::where('id', $id)->first();
        // $page = 'Edit Question';

        // return view('questions.edit', ['page' => $page], compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->content = request('content');
        $answer->save();
        return redirect('question/'.$answer->pertanyaan->uuid)->with('success', 'Jawaban Anda Berhasil Disimpan');
        //
        // $update = Question::where('id', $id)->update([
        //     'title' => $request['title'],
        //     'content' => $request['content'],
        //     'tag' => $request['tag']
        // ]);


        // return redirect('/question')->with('success', 'Berhasil update post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return back()->with('success', 'Jawaban Berhasil Dihapus');
        //
        // Question::destroy($id);
        // return redirect('/question')->with('success', "Pertanyaan berhasil di hapus!");
    }

}
