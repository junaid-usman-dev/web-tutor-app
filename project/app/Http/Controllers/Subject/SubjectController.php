<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Model\Subject;
use App\Model\Category;
use App\Model\SubjectUser;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::orderBy('id', 'DESC')->get();
        return view ('theme.admin.subject.subject_manager')->with(['subjects'=>$subjects]);
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
            $categories = Category::all();
            return view("theme.admin.subject.subject_create")->with([
                'categories' => $categories
                ]);
        }
        else
        {
            dd ("Error 400! Some thing bad happend.");
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
            'description' => 'required',
            'category' => 'required',
        ]);

        $name = ucwords($request->input("subject"));
        $description = $request->input("description");
        $category = $request->input("category");

        // dd ($subject, $description, $category);

        $already_exist = Subject::where('name',$name)->get();

        if ( count($already_exist) > 0 )
        {
            dd ("Error: Subject already exist."); 
        }
        else
        {
            $subject = new Subject();
            $subject->name = $name;
            $subject->description = $description;
            $subject->category_id = $category;

            $subject->save();

            return redirect()->route('admin.subject.list');
            // return ("A new subject has been created"); 
        }
        
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
    public function edit(Request $request, $id)
    {
        //
        $subject  = Subject::findOrFail($id);
        $categories  = Category::all();

        return view("theme.admin.subject.subject_edit")->with(['subject'=>$subject, 'categories'=> $categories]);
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
        $id = $request->input('id');
        $name = ucwords($request->input('subject'));
        $description = $request->input('description');
        $category = $request->input('category');

        $subject  = Subject::findOrFail($id);

        if ( !empty($subject) )
        {
            $subject->name = $name;
            $subject->description = $description;
            $subject->category_id = $category;

            $subject->save();

            return response()->json([
                'success' => 'Success! Your subject data has been updated. Server Response'
            ]);
            // return redirect()->route('admin.subject.list');
        }
        else
        {
            return response()->json([
                'error' => 'Error! Something went wronge, Please try later. Server Response'
            ]);
            // dd("Error 400: Subject not found.");
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
        $del_subject  = Subject::findOrFail($id)->delete();
        $del_subject_user  = SubjectUser::where('subject_id',$id)->delete();

        return redirect()->route('admin.subject.list');
    }
}
