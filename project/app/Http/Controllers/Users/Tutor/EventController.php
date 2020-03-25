<?php

namespace App\Http\Controllers\Users\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Model\Availability;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::guard('user')->user();
        $availabilities = Availability::all();
        return view ('theme.tutor.avail_calendar')->with(['user'=>$user, 'availabilities'=>$availabilities]);
        // return view('event.index', compact('events'));
        // return("TEst index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('event.create');
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
        // $request->validate([
        //     'user_id' => 'required',
        //     'title' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        // ],
        // [   
        //     'user_id.required' => 'User Id field is required.',
        //     'title.required' => 'Title field is required.',
        //     'start_date.required' => 'Start date is required.',
        //     'end_date.required' => 'End date is required.', 
        //     'start_time.required' => 'Start time is required.',        
        //     'end_time.required' => 'End time is required.',        
        // ]);
        
        // $user_id = $request->input('user_id');
        // $title = $request->input('title');
        // $start_date = $request->input('start_date');
        // $end_date = $request->input('end_date');
        
        // dd ($request->all());

        // $new_event = new Event();
        
        // $new_event->user_id = $user_id;
        // $new_event->title = $title;
        // $new_event->start_date = $start_date;
        // $new_event->end_date = $end_date;

        // $new_event->save();

        // return ("Event has been added.");

        Availability::create($request->all());
        return response()->json([
            'success' => true
        ]);

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
