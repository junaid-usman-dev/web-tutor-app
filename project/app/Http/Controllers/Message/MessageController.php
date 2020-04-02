<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\DB; // Library for query builder

use App\Model\Message;
use App\Model\Notification;
use App\User;


class MessageController extends Controller
{
    /**
     * 
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
    public function store(Request $request, $sender_id, $receiver_id, $message )
    {
        //
        // $sender_id = "2";
        // $receiver_id = "8";
        // $message = "some text some text";
        // $user = Auth::guard('user')->user();

        // $sender_id = $request->input('sender_id');
        // $receiver_id = $request->input('receiver_id');
        // $message = $request->input('message');

        // dd ($sender_id, $receiver_id, $message);

        $msg = new Message();

        $msg->sender_id = $sender_id;
        $msg->receiver_id = $receiver_id;
        $msg->text = $message;

        $msg->save();

        // -------- Notification  --------
        $noti_msg = new Notification();

        $noti_msg->sender_id = $sender_id;
        $noti_msg->receiver_id = $receiver_id;
        $noti_msg->text = $message;

        $noti_msg->save();
        // ------ End Notification -------------

        return redirect()->route('student.dashboard');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Conversation(Request $request)
    {
        //
        // $sender_id = "2";
        // $receiver_id = "8";
        // $message = "some text some text";
        $user = Auth::guard('user')->user();

        $sender_id = $request->input('sender_id');
        $receiver_id = $request->input('receiver_id');
        $message = $request->input('message');

        // dd ($sender_id, $receiver_id, $message);

        $msg = new Message();

        $msg->sender_id = $sender_id;
        $msg->receiver_id = $receiver_id;
        $msg->text = $message;

        $msg->save();

        // ---------------- notification ----------------
        $noti_msg = new Notification();

        $noti_msg->sender_id = $sender_id;
        $noti_msg->receiver_id = $receiver_id;
        $noti_msg->text = $message;

        $noti_msg->save();
        // ---------------- end notification ----------------


        $users_conversation = Message::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)
                        ->orWhere('sender_id',$receiver_id)->where('receiver_id',$sender_id)->get();

        if(Auth::guard('user')->user()->type == "student")
        {
            // Student Panel
            $conversation = view ('theme.student.partial.chat.conversation')->with([ 'users_conversation'=>$users_conversation, 'user'=>$user])->render();
            return response()->json([
                'success' => true,
                'conversation' => $conversation,
            ]);
        }
        else 
        {
            // Tutor Panel
            $conversation = view ('theme.tutor.partial.chat.conversation')->with([ 'users_conversation'=>$users_conversation, 'user'=>$user])->render();
            return response()->json([
                'success' => true,
                'conversation' => $conversation,
            ]);
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
    public function destroy($sender_id, $receiver_id)
    {
        //
        $del_notificatin = Notification::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->delete();
        // $del_notificatin->delete();
        dd ("Deleted.");
        // dd ($del_notificatin);

    }

    /**
     * Display conversation between two users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewConversation(Request $request, $sender_id, $contact_id )
    {
        //
        // $sender_id = "1";
        $receiver_id = $contact_id;
        // $contact_list = [];

        $user = Auth::guard('user')->user();
        $users_conversation = Message::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)
                        ->orWhere('sender_id',$receiver_id)->where('receiver_id',$sender_id)->get();

        // ----------  notification ------------
        $del_notificatin = Notification::where('sender_id',$contact_id)->where('receiver_id',$sender_id)->delete();

        //----------- end notification  ------------

        // dd($users_converstion);
        if(Auth::guard('user')->user()->type == "student")
        {
            // Student Panel
            $conversation = view ('theme.student.partial.chat.conversation')->with([ 'users_conversation'=>$users_conversation, 'user'=>$user ])->render();
            return response()->json([
                'success' => true,
                'conversation' => $conversation,
            ]);
        }
        else 
        {
            // Tutor Panel
            $conversation = view ('theme.tutor.partial.chat.conversation')->with([ 'users_conversation'=>$users_conversation, 'user'=>$user ])->render();
            return response()->json([
                'success' => true,
                'conversation' => $conversation,
            ]);
        }
        
       
    }

    /**
     * Display all contacts for specific user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Contacts(Request $request )
    {
        //
        $id = Auth::guard('user')->user()->id; // Sender Id
        $contacts = array();
        $sender_contacts = array();
        $receiver_contacts = array();
        $raw_contacts = array();

        $raw_contacts = Message::where('sender_id',$id)->orWhere('receiver_id',$id)->distinct()->get();
        $j=0;
        if (count($raw_contacts) > 0)
        {
            for ($i=0; $i < count($raw_contacts); $i++ )
            {
                $receiver_contacts[$i] = $raw_contacts[$i]->receiver_id;
                $sender_contacts[$j] = $raw_contacts[$j]->sender_id;
                $j += 1;
            }
        }
        else
        {
            // Empty Contact is List
            return ("Your Contact List is Empty....");
        }
        // Marge two arrays into one
        $length = count($receiver_contacts)+count($sender_contacts);
        $j = 0;
        for ($i=0; $i < $length; $i++)
        {
            if ($i<count($receiver_contacts))
            {
                $contacts[$i] = $receiver_contacts[$i];
            }
            else
            {
                $contacts[$i] = $sender_contacts[$j];
                $j +=1 ;
            }
        }
        // Reindexing the array
        $contacts = array_values( array_flip( array_flip( $contacts ) ) );
        // Removing specifc entity
        $key = $id;
        if (($key = array_search($key, $contacts)) !== false) {
            unset($contacts[$key]);
        }
        // Reindexing the array
        $contacts = array_values( array_flip( array_flip( $contacts ) ) );

        if (count($contacts) > 0)
        {
            for ($i=0; $i < count($contacts); $i++ )
            {
                $item = new \stdClass();
                $item = User::where('id',$contacts[$i])->first();
                    
                $contacts[] = clone $item;
            }
            // dd($items);
            return view ('student.contact_list')->with(['contacts'=>$contacts,'user_id'=>$id]);
        }
        else
        {
            // Empty Contact is List
            return ("Your Contact List is Empty.");
        }
    }

    /**
     * Display all notification for specific user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewAllNotification(Request $request, $id )
    {
        $user = Auth::guard('user')->user();
        $users_notification = Notification::where('receiver_id',$id)->get();  
        
        // dd ($users_notification);
        foreach ($users_notification as $notification)
        {
            // echo (gettype($notification)."</br>");
            // echo (count($notification)."</br>");
            $noti = $notification;
            $arr[] = clone $noti;
        }

        echo ( count($arr). "</br>");
    }
    
}
