<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Model\Test;
use App\Model\TestUser;
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
        if ( !empty(Auth::guard('admin')->user()) )
        {   
            $tests  = Test::orderBy('id', 'DESC')->get();
            return view ('theme.admin.test.test_manager')->with(['tests'=>$tests]);
        }
        else
        {
            dd ("Error 400! Some bad happend.");
        }

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
            return view ("theme.admin.test.test_create");
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
            'test' => 'required',
            'description' => 'required',
        ]);

        $name = ucwords($request->input('test'));
        $description = $request->input('description');

        // dd ($name, $description);

        $test = new Test();

        $test->name = $name;
        $test->description = $description;

        $test->save();

        return view ('theme.admin.test.question.question_create')->with([ 'test_id'=>$test->id ]);

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
        $test = Test::findOrFail($id);
        return view ('test.test_edit')->with(['test'=>$test]);
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
            'name'=> 'required',
            'description'=> 'required',
        ]);

        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');

        $test = Test::findOrFail($id);
        if ( empty($test) )
        {
            dd ("Something went wrong.");
        }
        else
        {
            $test->name = $name;
            $test->description = $description;

            $test->save();

            return redirect('admin/test/list');
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
        $test = Test::findOrFail($id)->delete();
        return redirect('admin/test/list');
    }

    /**
     * Show Test Result for specific tutor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function TutorResult(Request $request)
    {
        //
        $user_id = '7';
        $test_id = '3';

        $results = User::findOrFail($user_id);
        dd ($results);
        return view ('tutor.test.test_result')->with([ 'results'=>$results ]);
    }
}
