<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Question;

class QuestionController extends Controller
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
    public function create(Request $request, $test_id)
    {
        //
        // print_r ("ID:  "); print_r($request->test_id); print_r($test_id);
        return view ('theme.admin.test.question.question_create')->with([ 'test_id'=>$test_id ]);
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
            'test_id' => 'required',
            'title' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer' => 'required',
        ],
        [
            'title.required' => 'Title is required field.',
            'option_1.required' => 'Option 1 is required field.',
            'option_2.required' => 'Option 2 is required field.',
            'option_3.required' => 'Option 3 is required field.',
            'option_4.required' => 'Option 4 is required field.',
            'answer.required' => 'Answer is required field.',
        ]);

        $test_id = $request->input('test_id');
        
        $title = $request->input('title');
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $option_3 = $request->input('option_3');
        $option_4 = $request->input('option_4');
        $answer = $request->input('answer');
        
        // dd ( $test_id, $title, $option_1, $option_2, $option_3, $option_4, $answer );

        $question = new Question();

        $question->test_id = $test_id;
    
        $question->question = $title;
        $question->option_1 = $option_1;
        $question->option_2 = $option_2;
        $question->option_3 = $option_3;
        $question->option_4 = $option_4;
        $question->answer = $answer;

        $question->save();
        
        switch ($request->input('action')) {
            case 'finish':
                // finis creating quesiton 
                return redirect()->route('admin.test.list');
                break;
    
            case 'next':
                // create a new question
                return redirect()->route('admin.test.question.create', ['test_id' => $test_id]);
                break;
        }

        // return ("A new question has been added.");
        
        // return redirect()->route('admin.test.question.create', ['test_id' => $test_id]);
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
        //
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
