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
use App\Model\Question;
use App\Model\TestUser;
use App\Model\SubjectUser;
use App\Model\Message;
use App\Model\Education;



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
        // $user = Auth::guard('user')->user();
        // if( !empty($user->availabilities[5] ) )
        // {
        //     dd ($user->availabilities[0]->title);
        // }
        // else
        // {
        //     dd ("dfsdfd");
        // }

        $user = Auth::user();

        if ( count($user->availabilities) > 0 )
        {
            foreach ($user->availabilities as $availability )
            {
                print_r ($availability->title);
            }
        }
            
      

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
        return view('theme.admin.tutor.tutor_create');
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
            'phone' => 'required',
            'birthday' => 'required|date',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'password' => new Password,
            // 'type' => 'nullable|max:255',

            // 'subject' => 'required',
            // 'summary' => 'required',
            // 'teaching_method' => 'required',
            // 'price_per_hour' => 'required',

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
        $email = $request->email;
        $password = $request->password;

        $phone = $request->phone;
        $birthday = $request->birthday;
        $country = $request->country;
        $state = $request->state;
        $city = $request->city;
        $zipcode = $request->zipcode;
        // $type = $request->type;

        // $subject = $request->subject;
        // $summary = $request->summary;
        // $teaching_method = $request->teaching_method;
        // $price_per_hour = $request->price_per_hour;

        $veri_key = md5(time().$password); // email verification key 
        $encrypt_pass = Hash::make($password); # encrypting password
        // $encrypt_pass = base64_encode($password); # encrypting password
        
        //--------   Student Panel   -----------
        $user_phone = User::where('phone',$phone)->get();
        $user_mail = User::where('email_address',$email)->get();
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
            $user->email_address = $email;
            $user->password = $encrypt_pass;
            $user->verification_key = $veri_key;

            $user->phone = $phone;
            $user->birthday = $birthday;
            $user->country = $country;
            $user->state = $state;
            $user->city = $city;
            $user->zipcode = $zipcode;
            $user->type = "tutor";

            // $user->summary = $summary;
            // $user->teaching_method = $teaching_method;
            // $user->price_per_hour = $price_per_hour;

            $user->save();

            // $image = new Image();

            // $image->user_id = $id;
            // $image->name = "default-profile-image.jpg";
            // $image->path = "images";
            // $iamge->save();


            // dd ($user->id);
            // Send Email 
            // Mail::to('thebooster786@gmail.com')->send(new SendMailable($user));
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
    public function edit(Request $request)
    {
        
        if ( Auth::guard('user')->user()->type == "tutor" )
        {
            // Tutor
            // print_r ("Tutor");
            $user = User::findOrFail( Auth::guard('user')->user()->id );
            $subjects = Subject::all();
            return view('theme.tutor.tutor_profile_edit')->with(['user'=>$user, 'subjects'=>$subjects]);
        }
        else
        {
            dd("Error! Some thing bad happend.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEdit(Request $request)
    {
        if ( !empty(Auth::guard('admin')->user()) )
        {
            // Admin
            // print_r ("Admin");
            $tutor = User::findOrFail( $request->id );
            $subjects = Subject::all();
            return view('theme.admin.tutor.tutor_edit')->with(['tutor'=>$tutor, 'subjects'=>$subjects]);
        }
        else
        {
            dd("Error! Some thing bad happend.");
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

        // $subjects = SubjectUser::where('user_id',$id)->delete();
        // dd($subjects);

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
        
        // dd (($subject[0]));
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

                    $tutor->summary = $summary;
                    $tutor->price_per_hour = $price_per_hour;
                    $tutor->teaching_method = $teaching_method;

                    $tutor->save();

                    // Update Subjects
                    for ($i=0; $i< count($subject); $i++)
                    {
                        $subject_user = new SubjectUser();
                        $subject_user->subject_id = $subject[$i];
                        $subject_user->user_id = $id;
                        $subject_user->save();
                    }
    
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
            // Delete existing user subjects
            $del_subjects = SubjectUser::where('user_id',$id)->delete();

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

            $tutor->summary = $summary;
            $tutor->price_per_hour = $price_per_hour;
            $tutor->teaching_method = $teaching_method;

            $tutor->save();
            
            // update subjects 
            for ($i=0; $i< count($subject); $i++)
            {
                $subject_user = new SubjectUser();
                $subject_user->subject_id = $subject[$i];
                $subject_user->user_id = $id;
                $subject_user->save();
            }

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
     * Update Image for specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateImage(Request $request)
    {
        //
        $user = User::findOrFail($request->id);
        if ($request->hasFile('upload_image'))
        {
            // Upload Custom Profile Image
            $file = $request->file('upload_image');
            $new_name = rand() . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path("images"), $new_name ); working
            $file->move("images", $new_name );
         
            $user->images->name = $new_name;
            $user->images->save();

            return redirect()->route('admin.tutor.list');
        }
        else
        {
            // Redirect to dashboard without updating profile image 
            return redirect()->route('admin.tutor.list');
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
        // Delete all specific user data
        $del_user = User::findOrFail($id)->delete();
        $del_user_img = Image::where('user_id',$id)->delete();
        $del_user_payment = Payment::where('user_id',$id)->delete();
        $del_user_subject = SubjectUser::where('user_id',$id)->delete();

        return redirect()->route('admin.tutor.list');
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


    /**
     * Upload tutor qualification
     *
     * @return \Illuminate\Http\Response
     */
    public function AddEducatioin(Request $request )
    {  
        // $request->validate([
        //     'institute' => 'required',
        //     'certification' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        // ],
        // [   
        //     'institute.required' => 'Institute field is required.',
        //     'certification.required' => 'certification field is required.',
        //     'start_date.required' => 'Start date field is required.',
        //     'end_date.required' => 'End date field is required.',

        //     // 'start_date.required' => 'Start date field is required.',
        //     // 'end_date.required' => 'End date field is required.',
        // ]);

        $id = Auth::guard('user')->user()->id;
        $institute = $request->input('institute');
        $certificate = $request->input('certification');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // dd ($id, $institute, $certificate, $start_date, $end_date );
        
        $tutor = User::findOrFail($id);
        if ($tutor->type == 'tutor')
        {
            // Tutor Panel
            $add_education = new Education();

            $add_education->user_id = $id;
            $add_education->institute = $institute;
            $add_education->certification = $certificate;
            $add_education->start_date = $start_date;
            $add_education->end_date = $end_date;

            $add_education->save();

            // return redirect()->route('tutor.test.list');
            return response()->json([
                'success'=> true,
                ]);
        }
        else
        {
            dd ("Error 400! Some thing went wrong.");
            return response()->json([
                'error'=> true,
                ]);
        }
    }


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
     * Set time availability to specified tutor 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewAvailability(Request $request)
    {
        //
        $user = Auth::guard('user')->user();
        // $tutor = User::where('id',$id)->where('type','tutor')->first();
        return view ('theme.tutor.avail_calendar')->with(['user'=>$user]);
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
        $tutors = User::orderBy('id','DESC')->where('type','tutor')->get();
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
        $user = Auth::guard('user')->user();
        $tests = Test::orderBy('id', 'DESC')->get();
        return view('theme.tutor.test.test_list')->with(['tests'=>$tests, 'user'=>$user]);
    }

    /**
     * Display all test result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function TutorResult()
    {
        //
        $user = Auth::guard('user')->user();
        // $tests = Test::orderBy('id', 'DESC')->get();
        return view('theme.tutor.test.result_list')->with(['user'=>$user]);
        // return ("Result");
        
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
        // print_r("Next ------");
        // check auth user
        $user = Auth::guard('user')->user();
        $test = Test::findOrFail($id);
        if ( !empty($test) )
        {
            // $question_number = 0;
            
            // $test_id = $id;
            // $total_questions = count( $test->questions );

            // $request->session()->put('total_marks', $total_questions );
            // $request->session()->put('correct_answers',  $correct_answers);
            // $request->session()->put('wrong_answers', $wrong_answers);

            // $questions = Question::where('test_id',$id)->paginate(1);
            // dd ($test);
            return view('theme.tutor.test.test_attempt')->with([
                'user' => $user,
                // 'questions'=>$questions,
                'test'=>$test,

                // 'test_id'=>$test_id,
                // 'total_questions'=>$total_questions,
                // 'question_number'=>$question_number
            ]);
        }
        else
        {
            // Show Error That Invalid test id
            dd ("Error 400: Something went wronge.");
        }
    }
    
    /**
     * Next Question
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function NextQuestion(Request $request, $test_id, $total_questions, $question_number)
    // {
    //     //
    //     $test = Test::findOrFail($test_id);
    //     $option = $request->input('option');

    //     // Condition: Check Answer
    //     if ($option == $test->questions[$question_number]->answer )
    //     {

    //         $request->session()->put('correct_answers', $request->session()->get('correct_answers')+1 );
            
    //         // self::$correct_answer += 1; 
    //         // dd ("Correct Answer: ".$this->correct_answer);
    //     }
    //     else
    //     {
    //         $request->session()->put('wrong_answers', $request->session()->get('wrong_answers')+1 );

    //         // self::$wrong_answers += 1; 
    //         // dd ("Wrong Answer.");
    //     }
    //     $question_number += 1; // Next Question
    //     if ($question_number < $total_questions)
    //     {
    //         return view('tutor.test.attempt_question')->with([
    //             'test'=>$test,
    //             'test_id'=>$test_id,
    //             'total_questions'=>$total_questions,
    //             'question_number'=>$question_number
    //         ]);
    //     }
    //     else
    //     {
    //         // Submit Test
    //         return redirect ('tutor/test-submit');
    //         // dd ("Submit Test.");
    //     }
    // }

    /**
     * submit test for result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubmitTest(Request $request)
    {
        $question_number = [];
        $question_number = array_keys($request->choice);
        $test_id = $request->test_id;
        $total_question = $request->total_questions;
        
        $correct_answers = 0;
        $wrong_answers = 0;
        $not_attempted = 0;
        
        for ( $i=0; $i < count($question_number); $i++ )
        {
            $question = $question_number[$i];
            $user_ans = $request->choice[$question];
            $has_answer = Question::where('id',$question)->where('answer',$user_ans)->get();
            if (count($has_answer) > 0)
            {
                //Count Correct Answer
                $correct_answers += 1;
            }
            else
            {
                //Count Wrong Answer
                $wrong_answers += 1;
            }
        }
        $not_attempted = (count($question_number)) - ($wrong_answers + $correct_answers);

        $percentag = number_format( (($correct_answers/$total_question)*100), 2);

        // Make sure user already attempted this test or not
        $user = Auth::guard('user')->user();
        $has_user_attempted_test = TestUser::where('user_id',Auth::guard('user')->user()->id)->where('test_id',$test_id)->first();
        if ( !empty($has_user_attempted_test) )
        {
            // User has already been attempted this test
            // Check if user got any improvement 
            // dd($has_user_attempted_test->score);
            if ($has_user_attempted_test->score < $percentag )
            {
                // Replace with new score
                // $has_user_attempted_test->test_id = $test_id;
                // $has_user_attempted_test->user_id = Auth::guard('user')->user()->id;
                $has_user_attempted_test->score = $percentag;
                $has_user_attempted_test->save();
            } 
            else
            {
                // do not replace
                
            }
        }
        else
        {
            // User has not attempted this test before
            $test_user = new TestUser(); // Pivot Table
            $test_user->test_id = $test_id;
            $test_user->user_id = Auth::guard('user')->user()->id;
            $test_user->score = $percentag;
            $test_user->save();
        }
        return view('theme.tutor.test.test_result')->with([
            'percentag' => $percentag,
            'correct' => $correct_answers,
            'wrong' => $wrong_answers,
            'not_attempted' => $not_attempted,
            'user' => $user,
        ]);
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
            // Check User has paid fees or not
            if (Auth::user()->paid_fee == "1")
            {
                // ------  Getting contact list of a specific student  --------
                $id = $user_id; // Sender Id
                $contacts = array();
                $sender_contacts = array();
                $receiver_contacts = array();
                $raw_contacts = array();

                $raw_contacts = Message::orderBy('id', 'DESC')->where('sender_id',$id)->orWhere('receiver_id',$id)->distinct()->get();
                $j=0;
                $contact_list = [];

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
                    // return ("Your Contact List is Empty....");
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
                            
                        $contact_list[] = clone $item;
                    }
                    // dd($items);
                    // return view ('student.contact_list')->with(['items'=>$items,'user_id'=>$id]);
                }
                else
                {
                    // Empty Contact is List
                    // return ("Your Contact List is Empty.");
                }
                //----  End Contact List 

                // --------  Conversation -----------
                $users_conversation = [];
                $sender_id = Auth::guard('user')->user()->id;
                if ( count($contact_list) > 0)
                {
                    $receiver_id = $contact_list[0]->id; // Getting conversation of first user by default
                    $users_conversation = Message::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)
                            ->orWhere('sender_id',$receiver_id)->where('receiver_id',$sender_id)->get();
                }
                // -------  End Conversation  ----------

                return view ('theme.tutor.tutor_dashboard')->with([
                    'user' => $user,
                    'contact_list'=>$contact_list,
                    'users_conversation' => $users_conversation,
                    ]);

                // return view ('theme.tutor.tutor_dashboard')->with(['user' => $user]);
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
