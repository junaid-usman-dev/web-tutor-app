<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Model\Test;
use App\Model\TestUser;
use App\Model\Question;
use App\Model\Subject;
use App\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // if ( !empty(Auth::guard('admin')->user()) )
        // {   
            $tests  = Test::orderBy('id', 'DESC')->get();
            return view ('theme.admin.test.test_manager')->with(['tests'=>$tests]);
        // }
        // else
        // {
        //     dd ("Error 400! Some bad happend.");
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ( !empty(Auth::guard('admin')->user()) )
        {
            $subjects = Subject::all();
            return view ("theme.admin.test.test_create")->with(['subjects'=>$subjects]);
        }
        else
        {
            // Error
            dd("Error 400! Something bad happend.");
        }
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
            'subject' => 'required',
            'test' => 'required',
            'description' => 'required',
        ]);

        $subject = $request->input('subject');
        $name = ucwords($request->input('test'));
        $description = $request->input('description');

        // dd ($subject, $name, $description);

        $test = new Test();

        $test->subject_id = $subject;
        $test->name = $name;
        $test->description = $description;

        $test->save();
        
        return redirect()->route('admin.test.question.create', ['test_id' => $test->id]);

        // return view ('theme.admin.test.question.question_create')->with([ 'test_id'=>$test->id ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $test = Test::findOrFail($id);
        return view('theme.admin.test.test_preview')->with(['test'=>$test]);
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
        $test = Test::findOrFail($id);
        return view ('theme.admin.test.test_edit')->with(['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'id'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
        ]);

        $id = $request->input('id');
        $name = $request->input('title');
        $description = $request->input('description');

        $test = Test::findOrFail($id);
        if ( empty($test) )
        {
            dd ("Error 400: Something went wrong.");
        }
        else
        {
            $test->name = $name;
            $test->description = $description;

            $test->save();

            return redirect()->route('admin.test.list');
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
        $del_test = Test::findOrFail($id)->delete();
        $del_question = Question::where('test_id',$id)->delete();

        return redirect()->route('admin.test.list');
    }

    /**
     * Show Test Result for specific tutor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function TutorResult(Request $request)
    // {
    //     //
    //     $user_id = '3';
    //     $test_id = '51';

    //     $results = User::findOrFail($user_id);
    //     dd ($results->tests[0]->pivot->score);
    //     return view ('tutor.test.test_result')->with([ 'results'=>$results ]);
    // }
}
