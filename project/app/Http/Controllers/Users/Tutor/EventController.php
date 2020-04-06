<?php

namespace App\Http\Controllers\Users\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;


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
        
        $user_id = $request->input('user_id');
        $day = $request->input('day');
        // $start_date = $request->input('start_date');
        // $end_date = $request->input('end_date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        // dd ($request->all());
        
        $availabilities = Availability::where('user_id', $user_id)->where('title', $day)->get();
        // dd ($availabilities);
        if ( count($availabilities) > 0 )
        {
            foreach ($availabilities as $availbility)
            {
                // dd ($availbility->start_time);
                // Check the start time and end time lie between availability time slot or not 
                if( Carbon::parse($start_time)->between(Carbon::parse($availbility->start_time)->format('H:i:s'), Carbon::parse($availbility->end_time)->format('H:i:s'), true) 
                    || Carbon::parse($end_time)->between(Carbon::parse($availbility->start_time)->format('H:i:s'), Carbon::parse($availbility->end_time)->format('H:i:s'), true)
                )
                {
                    // Return Error Message
                    // dd("Not Valid");
                    return response()->json([
                        'error'=> true
                    ]);
                }
                // Check start time is less then availability start time then end time should be less then availability end time
                else if ( $start_time < Carbon::parse($availbility->start_time)->format('H:i:s') && ( $end_time < Carbon::parse($availbility->start_time)->format('H:i:s')) 
                        || $start_time > Carbon::parse($availbility->end_time)->format('H:i:s') && ( $end_time > Carbon::parse($availbility->end_time)->format('H:i:s'))
                    )
                {

                    // Return Success Message
                    // dd ("Not Found");
                    $new_availability = new Availability();
            
                    $new_availability->user_id = $user_id;
                    $new_availability->title = $day;
                    $new_availability->start_time = $start_time.":00";
                    $new_availability->end_time = $end_time.":00";

                    $new_availability->save();
                }
                else
                {
                    // Return Error Message
                    return response()->json([
                        'error'=> true
                    ]);
                }

            }
        }
        else
        {
            $new_availability = new Availability();
        
            $new_availability->user_id = $user_id;
            $new_availability->title = $day;
            $new_availability->start_time = $start_time.":00";
            $new_availability->end_time = $end_time.":00";

            $new_availability->save();
        }
        // Availability::create($request->all());
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
        $del_availability = Availability::findOrFail($id)->delete();
        return redirect ()->route("tutor.view.availability");
    }
}
