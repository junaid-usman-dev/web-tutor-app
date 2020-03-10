<?php

namespace App\Http\Controllers\Users\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Image;
use App\User;
use App\Payment;
use App\Model\Subject;
use App\Model\Review;
use App\Model\Test;
use App\Model\TestUser;
use App\Model\SubjectUser;

// use App\Model\Result;

use App\Rules\EmailFormat;
use App\Rules\Password;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Profile()
    {
        //
        // $users = DB::table('categories')
        //              ->groupBy('subject_id')
        //              ->get();

        // dd ($users);

        $user = Auth::user();
        if (Auth::user()->type == "tutor")
        {
            // $subjects = Subject::all()->distinct('category')->get();
            // dd ($user->subjects);
            return view ('theme.tutor.tutor_profile')->with(['user'=>$user]);
        }
        else
        {
            dd ("Error Unkown User");
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = Auth::user();
        if (Auth::user()->type== "student")
        {
            $user = User::findOrFail(Auth::user()->id);
            $tutors = User::all()->where('type', 'tutor');

            $tutor_list = view ('theme.student.partial.find_tutors')->with(['user'=> $user, 'tutors'=>$tutors])->render();

            return response()->json([
                'success' => true,
                'tutor_list' => $tutor_list,
            ]);
            // return view ('theme.student.tutor_list')->with(['user'=> $user, 'tutors'=>$tutors]);
        }
        else
        {
            dd ("Error! Unknown User.");
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
        return view('tutor.admin_tutor_create');
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
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email_addr' => new EmailFormat,
        //     'phone' => 'required',
        //     'birthday' => 'required|date',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'zipcode' => 'required',
        //     'password' => new Password,
        //     'type' => 'nullable|max:255',

        //     'subject' => 'required',
        //     'summary' => 'required',
        //     'teaching_method' => 'required',
        //     'price_per_hour' => 'required',

        // ],
        // [   
        //     'fname.required'    => 'first name field is required.',
        //     'lname.required'    => 'last name field is required.',
        //     'email_addr.required'    => 'The email must be a valid email address.',
        //     'phone.required'    => 'phone field is required.',
        //     'birthday.required'    => 'birthday field is required.',
        //     'country.required'    => 'country field is required.',
        //     'state.required'    => 'state field is required.',
        //     'city.required'    => 'city field is required.',
        //     'zipcode.required'    => 'zipcode field is required.',
        //     'password.required'    => 'password field is required.',
        
        //     'birthday.date'    => 'Enter a valid birthday date.',
        //     'password.min'    => 'Password length should be more than 8 character or digit.',
        //     'password.alpha_num'    => 'Password should atlear 1 digit.',
        //     'password.character'    => 'Password should atlear 1 character.',
        // ]);
        
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

        $subject = $request->subject;
        $summary = $request->summary;
        $teaching_method = $request->teaching_method;
        $price_per_hour = $request->price_per_hour;

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

            $user->summary = $summary;
            $user->teaching_method = $teaching_method;
            $user->price_per_hour = $price_per_hour;

            $user->save();
            
            // Send Email 
            Mail::to('thebooster786@gmail.com')->send(new SendMailable($user));
            // User Profile 
         
            return redirect()->route("admin.tutor.list");
         
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
        $tutor = User::findOrFail($id);
        return view ('tutor.home')->with('tutor',$tutor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        $subjects = Subject::all();
        // dd ($user->subjects);
        return view('theme.tutor.tutor_profile_edit')->with(['user'=>$user, 'subjects'=>$subjects]);
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
            'phone' => 'required',
            'birthday' => 'required|date',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            
            'old_password' => 'nullable',
            'new_password' => ['nullable', new Password],
            'confirm_password' => 'nullable',

            'subject' => 'required',
            'summary' => 'required',
            'teaching_method' => 'required',
            'price_per_hour' => 'required',
        ],
        [   
            'fname.required'    => 'first name field is required.',
            'lname.required'    => 'last name field is required.',
            'email.unique'    => 'The email has already been taken.dfdffdfadfs',
            'phone.required'    => 'phone field is required.',
            'birthday.required'    => 'birthday field is required.',
            'country.required'    => 'country field is required.',
            'state.required'    => 'state field is required.',
            'city.required'    => 'city field is required.',
            'zipcode.required'    => 'zipcode field is required.',
            // 'password.required'    => 'password field is required.',
            'birthday.date'    => 'Enter a valid birthday date.',

            'subject.required'    => 'subject field is required.',
            'summary.required'    => 'summary field is required.',
            'teaching_method.required'    => 'teaching method field is required.',
            'price_per_hour.required'    => 'price per hour field is required.',

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

        $subject = $request->subject;
        $summary = $request->summary;
        $price_per_hour = $request->price_per_hour;
        $teaching_method = $request->teaching_method;
        
        // dd ($id, $fname, $lname, $email, $old_password, $new_password,
        //     $confirm_password, $phone, $birthday, $country, $state, $city, $zipcode, $subject,
        //     $summary, $price_per_hour, $teaching_method );

        $tutor = User::findOrFail($id);

        if ( (!empty($old_password)) && (!empty($new_password)) && (!empty($confirm_password)) )
        {
            // IF user want to update his password
            if (Hash::check($old_password, $tutor->password)) {
                if ( $new_password == $confirm_password )
                {
                    $tutor->first_name = $fname;
                    $tutor->last_name = $lname;
                    $tutor->email_address = $email;
                    $tutor->password = Hash::make($new_password);
                    $tutor->phone = $phone;
                    $tutor->birthday = $birthday;
                    $tutor->country = $country;
                    $tutor->state = $state;
                    $tutor->city = $city;
                    $tutor->zipcode = $zipcode;

                    // $tutor->subject = $subject;
                    $tutor->summary = $summary;
                    $tutor->price_per_hour = $price_per_hour;
                    $tutor->teaching_method = $teaching_method;

                    $tutor->save();
    
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
            $tutor->first_name = $fname;
            $tutor->last_name = $lname;
            $tutor->email_address = $email;
            // $tutor->password = $hash_pasword;
            $tutor->phone = $phone;
            $tutor->birthday = $birthday;
            $tutor->country = $country;
            $tutor->state = $state;
            $tutor->city = $city;
            $tutor->zipcode = $zipcode;

            // $tutor->subject = $subject;
            $tutor->summary = $summary;
            $tutor->price_per_hour = $price_per_hour;
            $tutor->teaching_method = $teaching_method;

            $tutor->save();

            return response()->json([
                'success'=> "Success! Your profile information has been updated. Server Response"
            ]);
        }
    }

    /**
     * Update Image for specified resource from storage.
     *
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

            return redirect()->route('tutor.dashboard');
        }
        else
        {
            // Redirect to dashboard without updating profile image 
            return redirect()->route('tutor.dashboard');
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
        $tutor = User::findOrFail($id)->delete();
        return redirect('admin/tutor/list');
    }

    // /**
    //  * Store pyament form data
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function Payment(Request $request)
    // {
    //     //
    //     $id = $request->input('id');
    //     $card_number = $request->input('card_number');
    //     $month = $request->input('month');
    //     $year = $request->input('year');
    //     $cvv = $request->input('cvv_number');

    //     $payment = new Payment();

    //     $payment->user_id = $id;

    //     $payment->card_number = $card_number;
    //     $payment->expiry_month = $month;
    //     $payment->expiry_year = $year;
    //     $payment->cvv_number = $cvv;

    //     $payment->save();

    //     return view ('theme.register.tutor.qualification')->with(['id' => $id ]);
    // }


    // /**
    //  * Upload tutor qualification
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function UploadQualification(Request $request )
    // {  
    //     $request->validate([
    //         'id' => 'nullable',
    //         // 'subject' => 'nullable',
    //         'summary' => 'nullable',
    //         'method' => 'nullable',
    //         'price_per_hour' => 'nullable',
    //     ],
    //     [   
    //         // 'price_pr_hour.number'    => 'only number (0-9)',
    //     ]);

    //     $id = $request->input('id');
    //     // $subject = $request->input('subject');
    //     $summary = $request->input('summary');
    //     $method = $request->input('method');
    //     $price_per_hour = $request->input('price_per_hour');
        
    //     // $tutor->tutor_id = $id;

    //     $tutor = User::findOrFail($id);
    //     if ($tutor->type == 'tutor')
    //     {
    //         // Tutor Panel
    //         $tutor = User::findOrFail($id)->update(['summary' => $summary, 'teaching_method' => $method, 'price_per_hour' => $price_per_hour ]);
    //     }
    //     else
    //     {
    //         dd ("Some thing went wrong.");
    //     }
        
    //     return view ('theme.register.upload_image')->with(['id' => $id ]);
    //     // return view ('tutor.profile_picture',['id' => $id ]);
    // }


    // /**
    //  * Upload user profile Image
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function UploadPicture(Request $request )
    // {  
    //     $request->validate([
    //         'selected_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ],
    //     [   
    //         'selected_file.image'    => 'file should be image type.',
    //     ]);

    //     $id = $request->input('id');
    //     $file = $request->file('selected_file');
        
    //     $new_name = rand() . '.'. $file->getClientOriginalExtension();
    //     $file->move(public_path("images"), $new_name );
        
    //     $image = new Image ();
        
    //     $image->user_id = $id;
    //     $image->name = $new_name;
    //     $image->path = "images";

    //     $image->save();

    //     // $tutor = User::findOrFail($id)->update(['image_id' => $image->id]);
        
    //     return redirect()->route('tutor.home', ['id' => $id]);
    // }

    /**
     * Display the specified tutor prfile in student area
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function TutorProfile($id)
    // {
    //     //
    //     $tutor = User::where('id',$id)->where('type','tutor')->first();

    //     // print_r($tutor);
    //     // dd ($tutor->subjects[0]->name);
    //     return view ('tutor.profile')->with('tutor',$tutor);
    // }
    
    /**
     * Set time availability to specified tutor 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GeneralAvailability($id)
    {
        //
        $tutor = User::where('id',$id)->where('type','tutor')->first();
        return view ('tutor.general_availability')->with(['tutor'=>$tutor]);
        // return view ('tutor.profile')->with('tutor',$tutor);
    }

    /**
     * Set review to specified tutor 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AddReview(Request $request)
    {
        //
        $student_id = $request->input('student_id');
        $tutor_id = $request->input('tutor_id');
        $title = $request->input('title');
        $description = $request->input('desrciption');
        $star = $request->input('star');

        $review = new Review();

        $review->student_id = $student_id;
        $review->tutor_id = $tutor_id;
        $review->title = $title;
        $review->description = $description;
        $review->star_rating = $star;
        
        $review->save();

        dd ("Review has been added.");
        // return ("Review has been submited.");

    }

    /**
     * Set review to specified tutor 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function FilterBySubject(Request $request)
    {
        //
        // $subject = $request->input('subject');
        $subject_id = "1";
        $subjects = Subject::findOrFail($subject_id);
        dd ($subjects->users);

        // foreach($subjects->users as $user)
        // {
        //     dd ($user->id);
        // }
        
        // return view('tutor_list')->with(['subjects'=>$subjects]);

    }

    /**
     * Sort Tutor By Rating 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SortByRating(Request $request)
    {
        //
        $subject_id = "1";
        // $subjects = Subject::findOrFail($subject_id);
        return ("Sort Tutor by Rating.");
    }
    

    /**
     * Admin Tutor By result 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminIndex(Request $request)
    {
        //
        $tutors = User::all()->where('type','tutor');
        return view('theme.admin.tutor.tutor_manage')->with(['tutors'=> $tutors]);
    }

    /**
     * Display all test list
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function TestList()
    {
        //
        $test = Test::all();
        return view('tutor.test.test_list')->with(['tests'=>$test]);
    }

    /**
     * attempt a test 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AttemptTest(Request $request ,$id)
    {
        //
        $test = Test::findOrFail($id);
        if ( !empty($test) )
        {
            $question_number = 0;
            
            $test_id = $id;
            $total_questions = count( $test->questions );

            $request->session()->put('total_marks', $total_questions );
            // $request->session()->put('correct_answers',  $correct_answers);
            // $request->session()->put('wrong_answers', $wrong_answers);

            // dd ( $total_question );
            return view('tutor.test.attempt_question')->with([
                'test'=>$test,
                'test_id'=>$test_id,
                'total_questions'=>$total_questions,
                'question_number'=>$question_number
            ]);
        }
        else
        {
            // Show Error That Invalid test id
            dd ("Something went wronge.");
        }
    }
    
    /**
     * Next Question
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function NextQuestion(Request $request, $test_id, $total_questions, $question_number)
    {
        //
        $test = Test::findOrFail($test_id);
        $option = $request->input('option');

        // Condition: Check Answer
        if ($option == $test->questions[$question_number]->answer )
        {

            $request->session()->put('correct_answers', $request->session()->get('correct_answers')+1 );
            
            // self::$correct_answer += 1; 
            // dd ("Correct Answer: ".$this->correct_answer);
        }
        else
        {
            $request->session()->put('wrong_answers', $request->session()->get('wrong_answers')+1 );

            // self::$wrong_answers += 1; 
            // dd ("Wrong Answer.");
        }
        $question_number += 1; // Next Question
        if ($question_number < $total_questions)
        {
            return view('tutor.test.attempt_question')->with([
                'test'=>$test,
                'test_id'=>$test_id,
                'total_questions'=>$total_questions,
                'question_number'=>$question_number
            ]);
        }
        else
        {
            // Submit Test
            return redirect ('tutor/test-submit');
            // dd ("Submit Test.");
        }
    }


    /**
     * submit test for result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubmitTest(Request $request)
    {
        //
        $total_marks = $request->session()->get('total_marks');
        $correct_answers = $request->session()->get('correct_answers');
        $wrong_answers = $request->session()->get('wrong_answers');

        // $total_marks = floatval($total_marks);
        // $correct_answers = floatval($correct_answers);
        // $wrong_answers = floatval($wrong_answers);

        echo "Total Markes:" .$total_marks;
        echo "Correct Answers:" .$correct_answers;
        echo "Wrong Answers:" .$wrong_answers;

        if ( !empty($total_marks) && !empty($correct_answers) && !empty($wrong_answers) )
        {
            $percentag = ($correct_answers/$total_marks)*100;
            
            $percentag = round($percentag,2);
            echo "Percentag: " .$percentag;

            $test_user = new TestUser(); // Pivot Table

            $test_user->test_id = '2';
            $test_user->user_id = '7';
            $test_user->score = $percentag;
            $test_user->save();

            $request->session()->flash('total_marks', 'Task was successful!');
            $request->session()->flash('correct_answers', 'Task was successful!');
            $request->session()->flash('wrong_answers', 'Task was successful!');
        }
        else
        {
            dd ("Empty...");
        }
    }

     /**
     * Tutor Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request )
    {
        $user_id = $request->session()->get('session_tutor_id');
        $user_type = $request->session()->get('session_tutor_type');

        // $user_id = Auth::user()->id;
        // $user_type = Auth::user()->id;
        
        $user = User::where('id',$user_id)->first();
        if ( !empty($user) )
        {
            if (Auth::user()->paid_fee == "1")
            {
                // $this->StoreTutorSession($request, Auth::user()->id, Auth::user()->email_address, Auth::user()->phone, Auth::user()->type);
                return view ('theme.tutor.tutor_dashboard')->with(['user' => $user]);
            }
            else
            {
                // Payment form
                return view ('theme.register.tutor.payment')->with(['id' => Auth::user()->id]);
            }
            
        }
        else
        {
            return redirect()->to('signin');
        }
    }
    /**
     * Store Tutor Session
     *
     * @return \Illuminate\Http\Response
     */
    // public function StoreTutorSession(Request $request, $user_id, $user_email, $user_phone, $user_type)
    // {
    //     $request->session()->put('session_tutor_id',$user_id); // storing id into session
    //     $request->session()->put('session_tutor_email',$user_email); // storing user email into session
    //     $request->session()->put('session_tutor_phone',$user_phone); // storing user phone into session
    //     $request->session()->put('session_tutor_type',$user_type); // storing user type into session
    // }

    /*
    * Tutor Payment Submission
    *
    *@return \Illuminate\Http\Response
    */
    public function Payment(Request $request)
    {
        $user = Auth::user();
        return view('theme.tutor.tutor_payment')->with(['user'=>$user]);
    }

    /*
    * Tutor Payment Submission
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

        return redirect()->route('tutor.dashboard');
    }
    

    /*
    * Tutor Review
    *
    *@return \Illuminate\Http\Response
    */
    public function AllReview(Request $request)
    {
       
        $user = Auth::user();
        // $tutor = User::findOrFail($id);
        // dd ($user);
        return view('theme.tutor.all_review')->with(['user'=>$user ]);
    }
}
