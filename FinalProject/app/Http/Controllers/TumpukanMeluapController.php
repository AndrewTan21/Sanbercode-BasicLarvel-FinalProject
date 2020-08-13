<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class TumpukanMeluapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // eloquent
        $page = 'Question';
        $questions = Question::all();

        return view('questions.index', ['page' => $page], compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page = 'Create Question';
        return view('questions.create', ['page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "title" => 'required|unique:questions',
            "content" => 'required',
            "tag" => 'required'
        ]);

        $question = new Question;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->tag = $request->tag;
        $question->save();

        return redirect('/question')->with('success', 'Pertanyaan berhasil di simpan');
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
        // dengan eloquent
        $page = 'Question Detail';
        $question = Question::find($id);

        return view('questions.show', ['page' => $page], ["question" => $question]);
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
        // $question = DB::table('questions')->where('id', $id)->first();
        $question = Question::where('id', $id)->first();
        $page = 'Edit Question';

        return view('questions.edit', ['page' => $page], compact('question'));
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
        //
        $update = Question::where('id', $id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'tag' => $request['tag']
        ]);


        return redirect('/question')->with('success', 'Berhasil update post!');
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
        Question::destroy($id);
        return redirect('/question')->with('success', "Pertanyaan berhasil di hapus!");
    }
}
