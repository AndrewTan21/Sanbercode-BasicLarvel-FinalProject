<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionComment;
use App\Tag;
use DB;
use Auth;

class TumpukanMeluapController extends Controller
{
    /**
     * First a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        // eloquent
        $page = 'Question';
        if (Auth::user()) {
            $user = Auth::user();
            $questions = $user->questions;
        } else {
            $questions = Question::all();
        }
        
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

        $tags_arr = explode(',', $request['tag']);

        $tag_ids = [];
        foreach($tags_arr as $tag_name) {
            // $tag = Tag::where("name", $tag_name)->first();

            // if($tag) {
            //     $tag_ids[] = $tag->id;
            // } else {
            //     $new_tag = Tag::create(["name" => $tag_name]);
            //     $tag_ids[] = $new_tag->id;
            // }

            $tag = Tag::firstOrCreate(["name" => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        // $question = new Question;
        // $question->title = $request->title;
        // $question->content = $request->content;

        $question = Question::create([
            "title" => $request['title'],
            "content" => $request['content'],
            "tag" => $request['tag']
        ]);

        $question->tags()->sync($tag_ids);
        $user = Auth::user();
        $user->questions()->save($question);

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

    public function commentStore(Request $request)
    {
        // dd($request);

        $questionComment = QuestionComment::create([
            "content" => $request['content']
        ]);

        $user = Auth::user();
        $user->questions_comment()->save($questionComment);

        return redirect('/question')->with('success', 'Komentar berhasil di simpan');
    }

    public function commentGet($id) {

        $questionComment = QuestionComment::find($id);
        
        return view('questions.show', compact('questionComment'));
    }
}
