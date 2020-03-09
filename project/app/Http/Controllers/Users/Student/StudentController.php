<?php

namespace App\Http\Controllers\Users\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

use App\User;
use App\Image;
use App\Model\Favorite;
use App\Model\Review;
use App\Model\Category;
use App\Model\Subject;
use App\Payment;

use App\Rules\EmailFormat;
use App\Rules\Password;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class StudentController extends Controller
{

    /**
     * Student Profile
     *
     * @return \Illuminate\Http\Response
     */
    public function Profile(Request $request)
    {
        //
        // $user_id = $request->session()->get('session_student_id');
        $user = User::where('id',Auth::user()->id)->first();
        return view ('theme.student.student_profile')->with(['user'=> $user ]);
    }

    /**
     * Tutor Profile
     *
     * @return \Illuminate\Http\Response
     */
    public function TutorProfile(Request $request, $id)
    {
        //
        // $user = Auth::user();
        // dd ($user->subjects);
        $user = User::where('id',Auth::user()->id)->first();
        $tutor = User::findOrFail($id);
        return view ('theme.student.tutor_profile')->with(['user'=> $user, 'tutor'=>$tutor ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = User::all()->where('type','student');
        return view ('theme.admin.student.student_manage')->with(['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('student.student_create');
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
            'email_addr' => new EmailFormat,
            'phone' => 'required',
            'birthday' => 'required|date',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'password' => new Password,
            'type' => 'nullable|max:255',
        ],
        [   
            'fname.required'    => 'first name field is required.',
            'lname.required'    => 'last name field is required.',
            'email_addr.required'    => 'The email must be a valid email address.',
            'phone.required'    => 'phone field is required.',
            'birthday.required'    => 'birthday field is required.',
            'country.required'    => 'country field is required.',
            'state.required'    => 'state field is required.',
            'city.required'    => 'city field is required.',
            'zipcode.required'    => 'zipcode field is required.',
            'password.required'    => 'password field is required.',
        
            'birthday.date'    => 'Enter a valid birthday date.',
            'password.min'    => 'Password length should be more than 8 character or digit.',
            'password.alpha_num'    => 'Password should atlear 1 digit.',
            'password.character'    => 'Password should atlear 1 character.',
        ]);

        $fname = $request->fname;
        $lname = $request->lname;
        $email_addr = $request->email_addr;
        $password = $request->password;

        $phone = $request->phone;
        $birthday = $request->birthday;
        $country = $request->country;
        $state = $request->state;
        $city = $request->city;
        $zipcode = $request->zipcode;
        $type = $request->type;

        $veri_key = md5(time().$password); // email key 
        $encrypt_pass = base64_encode($password); # encrypting password
        
        //--------   Student Panel   -----------
        $user_phone = User::where('phone',$phone)->get();
        $user_mail = User::where('email_address',$email_addr)->get();
        if ( count($user_phone) > 0 )
        {
            dd("Phone number already exist.");
        } 
        else if ( count($user_mail) > 0 )
        {
            dd ("Email address already exist.");
        }
        else
        {
            // Store user data to database
            $user = new User();

            $user->first_name = $fname;
            $user->last_name = $lname;
            $user->email_address = $email_addr;
            $user->password = $encrypt_pass;
            $user->verification_key = $veri_key;

            $user->phone = $phone;
            $user->birthday = $birthday;
            $user->country = $country;
            $user->state = $state;
            $user->city = $city;
            $user->zipcode = $zipcode;
            $user->type = $type;

            $user->save();
            
            // Send Email 
            Mail::to('thebooster786@gmail.com')->send(new SendMailable($user));
            // User Profile 

            return view ('student.student_upload_image',['id' => $user->id]);
            
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
       $student = User::findOrFail($id);
       return view("student.home")->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $id = Auth::user()->id;
        $user = User::where('id',$id)->where('type', 'student')->first();

        if ( empty($user) )
        {
            dd ("Error: Something went wrong.");
        }
        else
        {
            return view('theme.student.student_profile_edit')->with(['user'=>$user]);
            // return view('student.edit_profile')->with(['student'=>$student]);
        }
        
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
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => new EmailFormat,
            'phone' => 'required',
            'birthday' => 'required|date',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'old_password' => 'nullable',
            'new_password' => ['nullable',new Password],
            'confirm_password' => 'nullable',
        ],
        [   
            'fname.required'    => 'first name field is required.',
            'lname.required'    => 'last name field is required.',
            'email.required'    => 'The email must be a valid email address.',
            'phone.required'    => 'phone field is required.',
            'birthday.required'    => 'birthday field is required.',
            'country.required'    => 'country field is required.',
            'state.required'    => 'state field is required.',
            'city.required'    => 'city field is required.',
            'zipcode.required'    => 'zipcode field is required.',
            // 'old_password.required'    => 'password field is required.',
            // 'new_password.required'    => 'password field is required.',
            // 'confirm_password.required'    => 'password field is required.',
        
            'birthday.date'    => 'Enter a valid birthday date.',
        ]);
     
        $id = $request->id;
    
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        $phone = $request->phone;
        $birthday = $request->birthday;
        $country = $request->country;
        $state = $request->state;
        $city = $request->city;
        $zipcode = $request->zipcode;

        // dd ($id, $fname, $lname, $email, $phone, $birthday, $country, $state, $city, $zipcode);
        // $encrypt_pass = Hash::make($password);

        $student = User::findOrFail($id);
        
        // Make sure user want to update his/her password
        if ( (!empty($old_password)) && (!empty($new_password)) && (!empty($confirm_password)) )
        {
            // Is password match with old password
            if (Hash::check($old_password, $student->password)) {
                if ( $new_password == $confirm_password )
                {
                    $student->first_name = $fname;
                    $student->last_name = $lname;
                    $student->email_address = $email;
                    $student->password = Hash::make($new_password);
                    $student->phone = $phone;
                    $student->birthday = $birthday;
                    $student->country = $country;
                    $student->state = $state;
                    $student->city = $city;
                    $student->zipcode = $zipcode;
    
                    $student->save();
    
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
            // User does not want to update his/her password
            $student->first_name = $fname;
            $student->last_name = $lname;
            $student->email_address = $email;
            // $student->password = Hash::make($new_password);
            $student->phone = $phone;
            $student->birthday = $birthday;
            $student->country = $country;
            $student->state = $state;
            $student->city = $city;
            $student->zipcode = $zipcode;

            $student->save();

            return response()->json([
                'success'=> "Success! Your profile information has been updated. Server"
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateImage(Request $request)
    {
        //
        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('upload_image'))
        {
            // Upload Custom Profile Image
            $file = $request->file('upload_image');
            $new_name = rand() . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path("images"), $new_name ); working
            $file->move("images", $new_name );
         
            $user->images->name = $new_name;
            
            $user->images->save();

            return redirect()->route('student.dashboard');
        }
        else
        {
            // Redirect to dashboard without updating profile image 
            return redirect()->route('student.dashboard');
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
        $student = User::findOrFail($id)->delete();
        return redirect()->route('admin.student.list');
    }

    

    /**
     * Add Favorite tutor to favorite category
     *
     * @return \Illuminate\Http\Response
     */
    public function AddFavorite(Request $request, $favorite_user_id )
    {  
        $found = Favorite::where('favorite_user_id',$favorite_user_id)->get();
        if ( count($found) < 1 )
        {
            $favorite = new Favorite();
            $favorite->user_id = Auth::user()->id;
            $favorite->favorite_user_id = $favorite_user_id;
            $favorite->save();
        }
        return redirect()->route('student.dashboard');
    }
    

    /**
     * List of all Favorite tutors
     *
     * @return \Illuminate\Http\Response
     */
    public function ListFavorite(Request $request)
    {  
        $user_id = Auth::user()->id;
        if (Auth::user()->type== "student")
        {
            $user = User::findOrFail($user_id);
            $favorites =  Favorite::where('user_id',$user_id)->get();
            if ( count($favorites) > 0)
            {
                // dd ($favorites);
                foreach ($favorites as $favorite)
                {
                    $tutor = new \stdClass();
                    $tutor = User::where('id',$favorite->favorite_user_id)->first();
                
                    $tutors[] = clone $tutor;
                }
            }
            else
            {
                $tutors = array();
                // dd ($tutors);
            }
        
            $min_price = User::min('price_per_hour');
            $max_price = User::max('price_per_hour');
            return view ('theme.student.favorite_tutors')->with([
                'user' => $user, 
                'tutors' => $tutors,
                'min_price' => $min_price,
                'max_price' => $max_price,
            ]);
            // dd($tutors[0]->first_name);
            // return view('theme.student.favorite_tutors')->with(['user'=>$user, 'tutors'=> $tutors]);
        }
        else
        {
            dd ("Error! Unknown Users.");
        }
    }

    /**
     * Upload user profile Image
     *
     * @return \Illuminate\Http\Response
     */
    public function UploadPicture(Request $request )
    {  
       
        $request->validate([
            'selected_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [   
            'selected_file.image'    => 'file should be image type.',
        ]);

        $id = $request->input('id');
        $file = $request->file('selected_file');
        
        $new_name = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("images"), $new_name );
        
        $image = new Image();
        
        $image->user_id = $id;
        $image->name = $new_name;
        $image->path = "images";
        
        $image->save();
        
        return redirect()->route('student.list');
    }

     /**
     * Student Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request )
    {
        $user_id = $request->session()->get('session_student_id');
        $user_type = $request->session()->get('session_student_type');

        // $user_id = Auth::user()->id;
        // $user_type = Auth::user()->type;
        $user = User::where('id',$user_id)->first();
        if ( !empty($user) )
        {
            $user = User::findOrFail($user_id);
            $favorites =  Favorite::where('user_id',$user_id)->get();
        
            $tutors = array();
            foreach ($favorites as $favorite)
            {
                $tutor = new \stdClass();
                $tutor = User::where('id',$favorite->favorite_user_id)->first();
                $tutors[] = clone $tutor;
            }
            // dd($tutors[0]->first_name); working
            // $this->StoreStudentSession($request, Auth::user()->id, Auth::user()->email_address, Auth::user()->phone, Auth::user()->type);
            return view ('theme.student.student_dashboard')->with(['user' => $user, 'tutors'=>$tutors]);
        }
        else
        {
            return redirect()->to('signin');
        }
    }
    /**
     * Store Student Session
     *
     * @return \Illuminate\Http\Response
     */
    // public function StoreStudentSession(Request $request, $user_id, $user_email, $user_phone, $user_type)
    // {
    //     $request->session()->put('session_student_id',$user_id); // storing id into session
    //     $request->session()->put('session_student_email',$user_email); // storing user email into session
    //     $request->session()->put('session_student_phone',$user_phone); // storing user phone into session
    //     $request->session()->put('session_student_type',$user_type); // storing user type into session
    // }

    /**
     * Tutors List
     *
     * @return \Illuminate\Http\Response
     */
    public function TutorList(Request $request )
    {
        $user = Auth::user();
        if (Auth::user()->type== "student")
        {
            $user = User::findOrFail(Auth::user()->id);
            $tutors = User::all()->where('type', 'tutor');
            
            $min_price = User::min('price_per_hour');
            $max_price = User::max('price_per_hour');

            // dd ($min_price, $max_price);

            return view ('theme.student.tutor_list')->with([
                'user' => $user, 
                'tutors' => $tutors,
                'min_price' => $min_price,
                'max_price' => $max_price,
            ]);
        }
        else
        {
            dd ("Error! Unknown Users.");
        }
    }

    /**
     * Filter Tutors by Teaching Method
     *
     * @return \Illuminate\Http\Response
     */
    public function FilterMethod(Request $request )
    {  
        $is_favorite = $request->input('is_favorite');
        $teaching_method = $request->input('teaching_method');
        $filter_price = $request->input('filter_price');

        // dd ($teaching_method, $filter_price);
        
        $user = Auth::user();
        if (Auth::user()->type== "student")
        {
            $user = User::findOrFail(Auth::user()->id);
            // $tutors = User::all()->where('type', 'tutor');
            $tutors = User::all()->where('type', 'tutor');

            if ( !empty($teaching_method) )
            {
                if ($teaching_method == "online")
                {
                    // online
                    // if ($is_favorite == "1")
                    // {
                    //     $user_id = Auth::user()->id;
                    //     $favorites =  Favorite::where('user_id',$user_id)->get();
                    //     // dd ($favorites);
                    //     foreach ($favorites as $favorite)
                    //     {
                    //         $tutor = new \stdClass();
                    //         $tutor = User::where('id',$favorite->favorite_user_id)->where('type', 'online')->orWhere('type','both')->first();
                        
                    //         $tutors_array[] = clone $tutor;
                    //     }
                    //     $tutors = $tutors_array;
                    // }
                    // else
                    // {
                        $tutors = $tutors->filter(function($tutor) {
                            if ($tutor->teaching_method == 'online' || $tutor->teaching_method == 'both')
                            {
                                return true;
                            }
                            return false;
                        });
                    // }
                    // $tutor_list = view ('theme.student.partial.find_tutors')->with(['user'=> $user, 'tutors'=>$tutors])->render();
                    // return response()->json([
                    //     'success' => true,
                    //     'tutor_list' => $tutor_list,
                    // ]);
                    
                }
                else if ($teaching_method == "in-person")
                {
                    // if ($is_favorite == "1")
                    // {
                    //     $user_id = Auth::user()->id;
                    //     $favorites =  Favorite::where('user_id',$user_id)->get();
                    //     // dd ($favorites);
                    //     foreach ($favorites as $favorite)
                    //     {
                    //         $tutor = new \stdClass();
                    //         $tutor = User::where('id',$favorite->favorite_user_id)->where('type', 'in-person')->orWhere('type','both')->first();
                        
                    //         $tutors_array[] = clone $tutor;
                    //     }
                    //     $tutors = $tutors_array;
                    // }
                    // else
                    // {
                        $tutors = $tutors->filter(function($tutor) {
                            if ($tutor->teaching_method == 'in-person' || $tutor->teaching_method == 'both')
                            {
                                return true;
                            }
                            return false;
                        });
                    // }
                }
                else
                {
                    // $tutors = User::where('type','tutor');
                }
            }
            if ( !empty($filter_price) )
            {
                // $min = implode(",",$filter_price);
                $price = explode(",",$filter_price);
                $min_price = $price[0];
                $max_price = $price[1];

                $tutors = $tutors->where('price_per_hour', '>=',$min_price)->where('price_per_hour','<=',$max_price); 
            }

            // $tutor_list = $price_filter . $method_filter;
            $tutor_list = view ('theme.student.partial.find_tutors')->with(['user'=> $user, 'tutors'=>$tutors])->render();
            return response()->json([
                    'success' => true,
                    'tutor_list' => $tutor_list,
                ]);
            
        }
        else
        {
            dd ("Error! Unknown User.");
        }
        
    }

    /*
    * Student Payment Submission
    *
    *@return \Illuminate\Http\Response
    */
    public function Payment(Request $request)
    {
        $user = Auth::user();
        return view('theme.student.student_payment')->with(['user'=>$user]);
    }

    /*
    * Student Payment Submission
    *
    *@return \Illuminate\Http\Response
    */
    public function SubmitPayment(Request $request)
    {
        
        $id = $request->input('id');
        $card_number = $request->input('card_number');
        $month = $request->input('month');
        $year = $request->input('year');
        $cvv = $request->input('cvv_number');

        $payment = new Payment();

        $payment->user_id = $id;

        $payment->card_number = $card_number;
        $payment->expiry_month = $month;
        $payment->expiry_year = $year;
        $payment->cvv_number = $cvv;
        $payment->save();

        $user = User::findOrFail($id);
        $user->paid_fee = "1";
        $user->save();

        return redirect()->route('change.mode');
        // return redirect()->route('student.dashboard');
    }

    /*
    * Tutor Review
    *
    *@return \Illuminate\Http\Response
    */
    public function AllReview(Request $request, $id)
    {

        $user = Auth::user();
        // dd ($user); // Auth User
        $tutor = User::findOrFail($id);
        $review = User::where('id', $id);
        
        // dd ( $review->user );
        return view('theme.student.tutor_review')->with(['user'=>$user, 'tutor'=>$tutor ]);
    }
    /*
    * Tutor Review
    *
    *@return \Illuminate\Http\Response
    */
    public function WriteReview(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'tutor_id' => 'required',
            'subject' => 'required',
            // 'email' => 'required',
            'review' => 'required',
            'star' => 'required',
        ],
        [
            'student_id.required' => 'Student field is required.',
            'tutor_id.required' => 'Tutor field is required.',
            'subject.required' => 'Subject field is required.',
            // 'email.required' => 'Email field is required.',
            'review.required' => 'Review field is required.',
            'star.required' => 'Star field is required.',
        ]);

        $student_id = $request->input('student_id');
        $tutor_id = $request->input('tutor_id');
        $title = $request->input('subject');
        // $email = $request->input('email');
        $description = $request->input('review');
        $star_rating = $request->input('star');

        // dd ($student_id, $tutor_id, $subject, $email, $review, $star);

        $review = new Review();
        $review->student_id = $student_id;
        $review->tutor_id = $tutor_id;
        $review->title = $title;
        $review->description = $description;
        $review->star_rating = $star_rating;

        $review->save();

        // return response()->json([
        //     'success'=> 'Success! Your review has been submitted.'
        // ]);
        
        $user = Auth::user();
        $tutor = User::findOrFail($tutor_id);
        $tutor = view ('theme.student.partial.partial_tutor_profile')->with([
            'user'=>$user,
            'tutor'=>$tutor
            ])->render();

        // $tutor = view ('theme.student.tutor_profile')->with([
        //     'user'=>$user,
        //     'tutor'=>$tutor
        //     ])->render();

        return response()->json([
            'success' => true,
            'tutor' => $tutor,
        ]);
    }

}
