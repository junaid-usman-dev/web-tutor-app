<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Admin;
use App\User;
// use App\Image;
use App\Model\Subject;
use App\Model\Test;

use App\Rules\EmailFormat; // Custom Rules for Email
use App\Rules\Password; // Custom Rules for Password

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //
        // $students = array();
        $students = User::orderBy('created_at','desc')->where('type','student')->get();
        $tutors = User::orderBy('created_at','desc')->where('type','tutor')->get();
        $subjects = Subject::all();
        $tests = Test::orderBy('id','DESC')->get();

        return view ('theme.admin.admin_dashboard')->with([
            'students'=>$students,
            'tutors'=>$tutors,
            'subjects'=>$subjects,
            'tests'=>$tests,
        ]);
    }
    
    /**
     * Render Signin Page
     *
     * @return \Illuminate\Http\Response
     */
    public function Signin()
    {
        //
        return view ('theme.admin.signin.admin_signin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
        return view ('theme.admin.admin_manager')->with(['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('theme.admin.create_admin');
    }

    /**
     * Login a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminLogin(Request $request)
    {
        //
        // $request->validate($request,[ 
        //     'email'=> 'required',
        //     'password'=> 'required',
        // ]);
        
        $email = $request->input('email');
        $password = $request->input('password');
        // $encrypt_pass =  base64_encode($password);

        // Hash::check('secret', $hashedPassword)
        // $encrypt_pass =  Hash::make($password);

        // dd ($encrypt_pass); 
        Auth::guard('admin')->attempt(['email_address' => $email, 'password' => $password]);
        
        if (Auth::guard('admin')->check())
        {
            // Authentication Passed.
            // $details = Auth::guard('admin')->user();
            // dd ($details);
            // $user = $details['original'];
            // $admin_id = $user[0]->id;
            // $admin_email = $user[0]->email;
            $this->StoreSession($request, Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->email_address );
            return response()->json([
                'success' => 'Go to home page.'
            ]); 
            // dd("Authentication Passed.");
        }
        else {
            // dd('Authentication faild.');
            return response()->json([
                'error' => 'Unknown Email or Password.'
            ]);
        }

        // $user = Admin::where('email_address',$email)->where('password',$encrypt_pass)->get();
        // $admin = Auth::guard('admin')->attempt(['email_address' => $email, 'password' => $password ]);
        // // dd ($admin);
        // if ( Auth::check() )
        // {
        //     dd ("Found");
        // }
        // else
        // {
        //     dd ("Invalid User -----------");
        // }

        // if (count($user) > 0)
        // {
        //     // Login
        //     // put data into session
        //     $admin_id = $user[0]->id;
        //     $admin_email = $user[0]->email;
        //     $this->StoreSession($request, $admin_id, $admin_email);

        //     return response()->json([
        //         'success' => 'Go to home page.'
        //     ]); 
        // }
        // else
        // {
        //     // Error
        //     // dd ("Unknown Email or Password.");
        //     return response()->json([
        //         'error' => 'Unknown Email or Password.'
        //     ]); 
        // }
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => new EmailFormat,
            'password' => new Password,
        ],
        [
            'fname.required' => 'first name field is required.',
            'lname.required' => 'last name field is required.',
            'email.required' => 'email field is required.',
            // 'password.required' => 'password field is required.',
        ]);
        // dd ("store");

        $first_name = $request->input('fname');
        $last_name = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        
        // $encrypt_pass = base64_encode($password); # encrypting password
        $encrypt_pass = Hash::make($password);

        // dd ($encrypt_pass, $encrypt_pass2 );

        $admin = new Admin ();

        $admin->first_name = $first_name;
        $admin->last_name = $last_name;
        $admin->email_address = $email;
        $admin->password = $encrypt_pass;
        $admin->block = "0";
        $admin->active = "0";
        // $admin->type = "admin";
        
        $admin->save();
        
        return redirect()->route("admin.list");
    
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
        $user = User::findOrFail($id);
        if ($user->type == "student")
        {
            return view ('theme.admin.student_profile')->with(['user'=> $user ]);
        }
        else if ($user->type == "tutor")
        {
            return view ('theme.admin.tutor_profile')->with(['user'=>$user]);
        } 
        else
        {
            dd ("Not valid user.");
        }

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
        $admin = Admin::findOrFail($id);
        return view('theme.admin.admin_edit')->with(['admin'=>$admin]);
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => new EmailFormat,
        ],
        [
            'fname.required' => 'first name field is required.',
            'lname.required' => 'last name field is required.',
            'email.required' => 'email field is required.',
        ]);
        
        // dd ("Updated");

        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
       
        if ( (!empty($old_password)) && (!empty($new_password)) && (!empty($confirm_password)) )
        {
            $admin = Admin::findOrFail($request->input('id'));
            // IF user want to update his password
            if (Hash::check($old_password, $admin->password)) {
                if ( $new_password == $confirm_password )
                {
                    // update user with password
                    $admin = Admin::findOrFail($request->input('id'));
      
                    $admin->first_name = $request->input('fname');
                    $admin->last_name = $request->input('lname');
                    $admin->email_address = $request->input('email');
                    $admin->password = Hash::make($request->input('new_password'));
                
                    $admin->save();
                    return response()->json([
                        'success'=> 'Success! Your profile information has been updated. Password Server'
                    ]);
                }
                else
                {
                    return response()->json([
                        'error'=> 'Password does not match. Server'
                    ]);
                }
            }
            else
            {
                return response()->json([
                    'error'=> 'Unknown Old Password.'
                ]);
            }
        }
        else
        {
            // Update user
            $admin = Admin::findOrFail($request->input('id'));
      
            $admin->first_name = $request->input('fname');
            $admin->last_name = $request->input('lname');
            $admin->email_address = $request->input('email');
            
            $admin->save();

            return response()->json([
                'success'=> "Success! Your profile information has been updated. Server Response"
            ]);
        }
      
        
        

        // return redirect()->to("/admin/list");
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
        // dd ('delete admin user');
        $admin = Admin::findOrFail($id)->delete();
        return redirect()->route("admin.list");
    }

    /**
     * Logout the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        //
        $request->session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.signin');
        // return ("Session has been deleted.");
    }


    /**
     * Session Keys for specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function StoreSession(Request $request, $admin_id, $admin_email)
    {
        //
        $request->session()->put('session_admin_id', $admin_id);
        $request->session()->put('session_admin_email', $admin_email);
    }

    /**
     * Tutor ALl reviews.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function AllReview(Request $request,$id)
    {
        //
        // $user = Auth::user();
        $tutor = User::findOrFail($id);
        // dd ($user);
        return view('theme.admin.tutor_reviews')->with(['tutor'=> $tutor ]);
    }
    
    
}
