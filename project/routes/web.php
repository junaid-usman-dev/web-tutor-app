<?php


Route::get('/test', function () {
    return view('theme.events.event');
});
// Route::get('/test', 'Registration\RegistrationController@test')->name('test');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});

/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
|
| Here is where you can register user loaded by StudentController
| 1 Sign up 
| 2 Sign in
| 3 reset password 
| 4 Gmail integration
| 5 Facebook integration
| 6 Send Email Verification
|
*/

// signup
Route::get('/signup', 'Registration\RegistrationController@create')->name('signup');
Route::post('/store', 'Registration\RegistrationController@store')->name('submit.user.info');
Route::get('/verify', 'Registration\RegistrationController@ListStudent');

//Signin
Route::get('/signin', 'Registration\RegistrationController@index')->name('signin'); 
Route::post('/home', 'Registration\RegistrationController@home');

Route::get('/dashboard', 'Registration\RegistrationController@dashboard')->name('dashboard'); 

// Logout user
Route::get('/logout','Registration\RegistrationController@Logout')->name('logout'); 

// forget password
Route::get('/confirm-email-address', function () {
    return view('theme.register.forget_password.send_email');
});
Route::post('/forgetpassword/verification', 'Registration\RegistrationController@ForgetPassword'); // check username/email address
Route::get('/reset-password', 'Registration\RegistrationController@ResetPassword'); // view update page
Route::post('/password/updated', 'Registration\RegistrationController@UpdatePassword')->name('user.password.update'); // updpate password
// end forget password url

// Reset Password
// Route::get('/reset-password', 'Registration\RegistrationController@UserResetPassword'); // reset user password
// Route::post('/reset-password', 'Registration\RegistrationController@UserResetPasswordData')->name('user.reset.password'); // reset user password
// end Reset Password


// Socialite Authentication url
Route::get('login/{service}', 'Registration\RegistrationController@redirectToProvider');
Route::get('login/{service}/callback', 'Registration\RegistrationController@handleProviderCallback');

// add usernname for Facebook and Google user
Route::post('/username', 'Registration\RegistrationController@AddUsername');

// ----------------------------------------------------------------------------------------------------

Route::post('/upload-profile-image', 'Registration\RegistrationController@UploadPicture')->name('upload.profile.image'); // Upload profile picture
Route::get('/upload-profile-image/skip', 'Registration\RegistrationController@SkipUploadPicture')->name('skip.upload.profile.image'); // Skip Upload profile picture

Route::post('/submit/payment', 'Registration\RegistrationController@Payment')->name('tutor.fee.submission'); // Submit Registration Fee
Route::post('/setup_profile', 'Registration\RegistrationController@UploadQualification')->name('tutor.profile.setup'); // Add Qualification


// Google Location
// Route::get('/google-map', function () {
//     return view('location');
// });

// Appointment
Route::get('/appointment', function () {
    return view('appointment');
});

// Change Mode
Route::get('/change-mode', 'Registration\RegistrationController@ChangeMode')->name('change.mode'); 


/*
|--------------------------------------------------------------------------
| Student
|--------------------------------------------------------------------------
|
| 1 Dashboard 
| 2 Search Tutors
| 3 List Favorite Tutors
| 4 Message to the specific tutor
| 5 Facebook integration
| 6 Send Email Verification
|
*/

Route::prefix('student')->group(function () {

    Route::get('/', 'Users\Student\StudentController@dashboard')->name('student.dashboard');

    Route::get('/profile', 'Users\Student\StudentController@Profile')->name('student.profile');
    Route::post('/update-image', 'Users\Student\StudentController@UpdateImage')->name('student.update.image'); // Update tutor profile

    Route::get('/payment', 'Users\Student\StudentController@Payment')->name('student.payment'); // Payment Form
    Route::get('/submit-payment', 'Users\Student\StudentController@SubmitPayment')->name('student.submit.payment'); // Payment Form

    // Route::get('/home/{id}', 'Users\Student\StudentController@show')->name('student.home'); // Home Page

    Route::get('/edit', 'Users\Student\StudentController@edit')->name('student.edit.profile'); // Edit student profile
    Route::post('/update', 'Users\Student\StudentController@update')->name('student.update.profile'); // Update student profile

    Route::get('/tutor-list', 'Users\Student\StudentController@TutorList')->name('student.tutors.list'); // List of all Tutors
    Route::get('/tutor-profile/{id}', 'Users\Student\StudentController@TutorProfile')->name('student.tutor.profile');
    Route::get('/tutor-list-filter', 'Users\Student\StudentController@FilterMethod')->name('student.filter.by.teaching.method'); // Filter by Teaching Method
    
    // Route::get('/submit-review', 'Users\Tutor\TutorController@WriteReview')->name('student.tutor.review'); // Tutor General Availability
    Route::get('/tutor-all-review/{id}', 'Users\Student\StudentController@AllReview')->name('student.tutor.all.review'); // all reviews
    Route::get('/write-review', 'Users\Student\StudentController@WriteReview')->name('student.tutor.review'); // Edit student profile

    Route::get('/add-to-favorit-list/{favorite_user_id}', 'Users\Student\StudentController@AddFavorite')->name('student.favorite.tutors'); // Add tutor to Favorite category
    Route::get('/favorite-tutors', 'Users\Student\StudentController@ListFavorite')->name('student.favorite.tutors.list'); // List of all Favorite Tutors
    Route::get('/remove-to-favorit-list/{favorite_user_id}', 'Users\Student\StudentController@RemoveFavorite')->name('student.favorite.tutors.remove'); // Add tutor to Favorite category

    // Class Schedule
    Route::post('/class-schedule', 'Users\Student\StudentController@AddSchedule')->name('student.class.schedule'); // Add tutor to Favorite category

    
    /**
     * Message
     */
    Route::prefix('message')->group(function () {
        Route::get('/conversation', 'Message\MessageController@Conversation')->name('message.conversation'); // Display conversion between two person
        Route::get('/contact-list/{id}', 'Message\MessageController@Contacts')->name('message.contact.list'); // Contact list for specfic person
        
        Route::get('/send/{sender_id}/{receiver_id}/{message}', 'Message\MessageController@store')->name('student.message.send'); //Start Chat/ Send Message

        Route::get('/view-conversation/{sender_id}/{contact_id}', 'Message\MessageController@ViewConversation')->name('sdsd.message.conversation.test'); // Display conversion between two person

    });


    // Route::get('/pagination', 'Users\Student\StudentController@Pagination'); // all reviews


});

/*
|--------------------------------------------------------------------------
| Tutor
|--------------------------------------------------------------------------
|
| 1 Dashboard 
| 2 List Of Students
| 3 Set Profile
| 4 Participate in Tests
| 5 Choose Subjects
| 6 View Results
|
*/

Route::prefix('tutor')->group(function () {

    // Route::get('option', function () {
    //     return view('tutor.tutor_option');
    // });
    Route::get('/', 'Users\Tutor\TutorController@dashboard')->name('tutor.dashboard');

    Route::get('/profile', 'Users\Tutor\TutorController@Profile')->name('tutor.profile');
    Route::post('/update-image', 'Users\Tutor\TutorController@UpdateImage')->name('tutor.update.image'); // Update tutor profile
    
    // Route::post('/setup_profile', 'Users\Tutor\TutorController@UploadQualification')->name('tutor.profile.setup'); // Add Qualification
    // Route::post('/uploaded', 'Users\Tutor\TutorController@UploadPicture')->name('tutor.upload.tutor.image'); // Upload profile picture
    // Route::get('/home/{id}', 'Users\Tutor\TutorController@show')->name('tutor.home'); // Home Page
    Route::get('/payment', 'Users\Tutor\TutorController@Payment')->name('tutor.payment'); // Payment Form
    Route::get('/submit-payment', 'Users\Tutor\TutorController@SubmitPayment')->name('tutor.submit.payment'); // Payment Form

    Route::get('/edit', 'Users\Tutor\TutorController@edit')->name('tutor.edit.profile'); // Edit tutor profile
    Route::post('/update', 'Users\Tutor\TutorController@update')->name('tutor.update.profile'); // Update tutor profile
    
    // Route::get('/list', 'Users\Tutor\TutorController@index')->name('tutor.list'); // Display All Tutors

    // Route::get('/profile/{id}', 'Users\Tutor\TutorController@TutorProfile')->name('tutor.profile'); // View specific tutor profile as a student
    Route::get('/all-review', 'Users\Tutor\TutorController@AllReview')->name('tutor.all.review'); // all reviews

    // Route::get('/general-availability', 'Users\Tutor\TutorController@ViewAvailability')->name('tutor.general.availability'); // Tutor General Availability
    // Route::get('/general-availability/{id}', 'Users\Tutor\TutorController@GeneralAvailability')->name('tutor.general.availability.tess'); // Tutor General Availability
    // Route::get('/create-event', 'Users\Tutor\EventController@store')->name('tutor.event.add'); // Tutor General Availability
    
    Route::get('/general-availability','Users\Tutor\EventController@index')->name('tutor.view.availability'); // Tutor General Availability;
    Route::post('/add-availability','Users\Tutor\EventController@store')->name('tutor.add.availability'); // Tutor Add Availability;
    
    // Route::post('store','Users\Tutor\EventController@store');
    // Route::get('index','Users\Tutor\EventController@index');
    // Route::resource('events', 'Users\Tutor\EventController');

    Route::get('/submit-review', 'Users\Tutor\TutorController@AddReview')->name('tutor.review'); // Tutor General Availability

    Route::get('/filter-by-subject', 'Users\Tutor\TutorController@FilterBySubject')->name('filter.tutor.by.subject'); // Tutor General Availability
    Route::get('/sort-by-rating', 'Users\Tutor\TutorController@SortByRating')->name('sort.tutor.by.rating'); // Sort Tutor By Rating

    Route::get('/test-list', 'Users\Tutor\TutorController@TestList')->name('tutor.test.list'); // Test List
    Route::get('/attempt-test/{id}', 'Users\Tutor\TutorController@AttemptTest')->name('tutor.test.attempt'); // Attempt Test
    //Route::post('/next-question/{test_id}/{total_questions}/{question_id}', 'Users\Tutor\TutorController@NextQuestion'); // Next Question
    Route::post('/submit-test', 'Users\Tutor\TutorController@SubmitTest')->name('tutor.test.submit'); // Submit Test
    Route::get('/test-results-list', 'Users\Tutor\TutorController@TutorResult')->name('tutor.test.result.list'); // Test Result
    
    Route::post('/add-education', 'Users\Tutor\TutorController@AddEducatioin')->name('tutor.add.education.'); // Test Result

    /**
     * Message
     */
    Route::prefix('message')->group(function () {
        Route::get('/conversation', 'Message\MessageController@Conversation')->name('message.conversation'); // Display conversion between two person
        Route::get('/contact-list/{id}', 'Message\MessageController@Contacts')->name('message.contact.list'); // Contact list for specfic person
        
        Route::get('/send/{sender_id}/{receiver_id}/{message}', 'Message\MessageController@store')->name('tutor.message.send'); //Start Chat/ Send Message

        Route::get('/view-conversation/{sender_id}/{contact_id}', 'Message\MessageController@ViewConversation')->name('sdsd.message.conversation.test'); // Display conversion between two person

    });


});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
| 1 Create New Admin User
| 2 Manage Subjects
| 3 Manage Tests
| 4 Manage Tutors
| 5 Manage Students
| 6 
|
*/

Route::prefix('admin')->group(function () {

    /*
    * Admin URL's
    */
    Route::get('/signin', function () {
        return view('theme.admin.signin.admin_signin');
    })->name('admin.signin'); // Admin Sign in
    // Route::get('/signin', 'Users\Admin\AdminController@Signin')->name('admin.signin'); // Admin Sign in
    
    Route::post('/home', 'Users\Admin\AdminController@AdminLogin'); // Admin Sign in

    Route::get('/logout', 'Users\Admin\AdminController@logout')->name('admin.logout'); // logout specific admin user

    Route::get('/', 'Users\Admin\AdminController@dashboard')->name('admin.dashboard');

    // Admin Home Options
    Route::get('/home-page', function () {
        return view('admin.home.home');
    });


    Route::get('/create', 'Users\Admin\AdminController@create')->name('create.admin'); // Create specific admin
    Route::post('/store', 'Users\Admin\AdminController@store'); 
    Route::get('/edit/{id}', 'Users\Admin\AdminController@edit')->name('admin.edit'); // edit specific user
    Route::post('/update', 'Users\Admin\AdminController@update'); // update specific user

    Route::get('/list', 'Users\Admin\AdminController@index')->name('admin.list'); // Display Admin List
    Route::get('/destroy/{id}', 'Users\Admin\AdminController@destroy'); // destroy specific user
    

    /*
    * Subjects: Ony Admin can create, delete and edit the subject
    */
    Route::prefix('subject')->group(function () {

        Route::get('/list', 'Subject\SubjectController@index')->name('admin.subject.list'); // display all subjects

        Route::get('/create', 'Subject\SubjectController@create')->name('admin.subject.create'); // create a new subject
        Route::post('/store', 'Subject\SubjectController@store')->name('admin.subject.store'); // store a new created subject to db

        Route::get('/delete/{id}', 'Subject\SubjectController@destroy')->name('admin.subject.delete'); // delete specific resource from db

        Route::get('/edit/{id}', 'Subject\SubjectController@edit')->name('admin.subject.edit'); // edit a specific subject
        Route::post('/update', 'Subject\SubjectController@update')->name('admin.subject.update'); // update a specific subject

    });

    /*
    * Student: Ony Admin can create, delete and edit the Student
    */
    Route::prefix('student')->group(function () {

        Route::get('/list', 'Users\Student\StudentController@index')->name('admin.student.list'); // display all student

        Route::get('/create', 'Users\Student\StudentController@create')->name('admin.student.create'); // create a new student
        Route::post('/store', 'Users\Student\StudentController@store')->name('admin.student.store'); // store a new created student to db
        Route::get('/delete/{id}', 'Users\Student\StudentController@destroy'); // delete specific resource from db

        Route::get('/edit/{id}', 'Users\Student\StudentController@AdminEdit')->name('admin.student.edit'); // edit a specific student
        Route::post('/update', 'Users\Student\StudentController@update')->name('admin.student.update'); // update a specific student
        Route::post('/update-image', 'Users\Student\StudentController@AdminUpdateImage')->name('admin.student.update.image'); // Upload profile picture

        Route::get('/profile/{id}', 'Users\Admin\AdminController@show')->name('admin.student.profile'); // display all student

    });

    /*
    * Tutor: Ony Admin can create, delete and edit the Student
    */
    Route::prefix('tutor')->group(function () {

        Route::get('/list', 'Users\Tutor\TutorController@AdminIndex')->name('admin.tutor.list'); // display all tutor
        
        Route::get('/create', 'Users\Tutor\TutorController@create')->name('admin.tutor.create'); // create a new tutor
        Route::post('/store', 'Users\Tutor\TutorController@store')->name('admin.tutor.store'); // store a new created tutor to db

        Route::get('/edit/{id}', 'Users\Tutor\TutorController@AdminEdit')->name('admin.tutor.edit'); // edit a specific tutor
        Route::post('/update', 'Users\Tutor\TutorController@update')->name('admin.tutor.update'); // update a specific tutor
        Route::get('/delete/{id}', 'Users\Tutor\TutorController@destroy')->name('admin.tutor.delete'); // delete specific resource from db

        Route::get('/profile/{id}', 'Users\Admin\AdminController@show')->name('admin.tutor.profile'); //View Specific Tutor Profile
        Route::get('/all-review/{id}', 'Users\Admin\AdminController@AllReview')->name('admin.tutor.all.review'); // all reviews

        Route::post('/update-image', 'Users\Tutor\TutorController@AdminUpdateImage')->name('admin.tutor.update.image'); // Upload profile picture

    });

    /*
    * Test: Ony Admin can create, delete and edit the Student
    */
    Route::prefix('test')->group(function () {

        Route::get('/list', 'Test\TestController@index')->name('admin.test.list'); // display all test
        Route::get('/preview/{id}', 'Test\TestController@show')->name('admin.test.preview'); // display all test

        Route::get('/create', 'Test\TestController@create')->name('admin.test.create'); // create a new test
        Route::post('/store', 'Test\TestController@store')->name('admin.test.store'); // store a new created test to db
        
        Route::get('/delete/{id}', 'Test\TestController@destroy')->name('admin.test.delete'); // delete specific resource from db

        Route::get('/edit/{id}', 'Test\TestController@edit')->name('admin.test.edit'); // edit a specific test
        Route::post('/update', 'Test\TestController@update')->name('admin.test.update'); // update a specific test

        /*
        * Question: Ony Admin can create, delete and edit the Question
        */
        Route::prefix('question')->group(function () {

            // Route::get('/list', 'Test\TestController@index')->name('admin.test.list'); // display all question
            Route::get('/create/{test_id}', 'Test\QuestionController@create')->name('admin.test.question.create'); // create a new question for specific test
            Route::post('/store', 'Test\QuestionController@store')->name('admin.test.question.store'); // store a new created question to db
            // Route::post('/finish', 'Test\QuestionController@finish')->name('admin.test.question.finish'); // store a new created question to db
            
            Route::get('/delete/{id}', 'Test\QuestionController@destroy')->name('admin.test.question.delete'); // delete specific resource from db

            Route::get('/edit/{id}', 'Test\QuestionController@edit')->name('admin.test.question.edit'); // edit a specific test
            Route::post('/update', 'Test\QuestionController@update')->name('admin.test.question.update'); // update a specific test

        });

    });

});

