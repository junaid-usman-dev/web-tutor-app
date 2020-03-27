



{{-------   Star Rating  -----------------}}
@php
    $total_review = count($tutor->reviews); // Count total Reviews
    $obtain_rating = 0.0; // Obtain rating out of 5
    $number_of_ratings = count($tutor->reviews)*5;
    $five_star = 0; // total number of five stars
    $four_star = 0; // total number of four stars
    $three_star = 0; // total number of three stars
    $two_star = 0; // total number of two stars
    $one_star = 0; // total number of one stars
    $five_star_progress = 0;
    $four_star_progress = 0;
    $three_star_progress = 0;
    $two_star_progress = 0;
    $one_star_progress = 0;

    $total_rating = 0;

@endphp

@foreach ($tutor->reviews as $review) 
    @php
        $total_rating += intval($review->star_rating); // calculating total reviews
    @endphp
    @if ($review->star_rating == "5")
    @php
        $five_star += 1; // sum of total five stars
    @endphp
    @elseif ($review->star_rating == "4")
        @php
            $four_star += 1; // sum of total four stars
        @endphp
    @elseif ($review->star_rating == "3")
        @php
            $three_star += 1; // sum of total three stars
        @endphp
    @elseif ($review->star_rating == "2")
        @php
            $two_star += 1; // sum of total two stars
        @endphp
    @elseif ($review->star_rating == "1")
        @php
            $one_star += 1; // sum of total one stars
        @endphp
    @endif
    
@endforeach
@php
    if ($number_of_ratings != 0)
    {
        $obtain_rating = ($total_rating/$number_of_ratings)*5; // obtaining rating reviews percentage out of 5
        $obtain_rating = number_format($obtain_rating,1);
    
        $five_star_progress = ( ($five_star*5)/$number_of_ratings)*100; // calculating five stars rating percentage out of 100
        $four_star_progress = ( ($four_star*4)/$number_of_ratings)*100; // calculating fourstars rating percentage out of 100
        $three_star_progress = ( ($three_star*3)/$number_of_ratings)*100;  // calculating three stars rating percentage out of 100
        $two_star_progress = ( ($two_star*3)/$number_of_ratings)*100; // calculating two stars rating percentage out of 100
        $one_star_progress = ( ($one_star*3)/$number_of_ratings)*100; // calculating one stars rating percentage out of 100
    }
    
@endphp
{{-------   End Star Rating  -----------------}}













<div class="col-md-9">

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 ">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body card-comments">
                                        <div class="row">
                                            <div class="col-2 text-left">
                                                <img src="{{ url('/') }}/{{ $tutor->images->path }}/{{ $tutor->images->name }}" alt=""
                                                    class="img-circle img-fluid">
                                            </div>
                                            <div class="col-9 ">
                                                <h2 class="username ju-di"><strong>{{ $tutor->first_name }}
                                                    {{ $tutor->last_name }}</strong></h2>
                                                    <a href="{{ url('/student/add-to-favorit-list') }}/{{ $tutor->id }}" class="btn btn-info ju-fl" >Add To Favorite</a>
                                                <p class="text-lg">
                                                    {{-- @foreach ($tutor->categories as $category) --}}
                                                        @foreach ($tutor->subjects as $subject)
                                                            {{ $subject->name }},
                                                        {{-- @endforeach --}}
                                                        {{-- {{ $category->name }}, --}}
                                                    @endforeach
                                                </p>
                                                <span class="text-sm">
                                                    {{-- <em class="fas fa-star  text-warning"></em>
                                                    <em class="fas fa-star text-warning"></em>
                                                    <em class="fas fa-star text-warning"></em>
                                                    <em class="fas fa-star text-warning"></em>
                                                    <em class="fas fa-star text-warning"></em> --}}
                                                    <div class="my-rating-7 d-inline" data-rating="{{ $obtain_rating }}"></div>
                                                        <div class="d-inline">
                                                            {{ $obtain_rating }}
                                                            <a href="#">( {{ $total_review }} Ratings)</a>
                                                        </div>
                                                    </span>
                                                <p class="text-sm"> <em
                                                        class="fas fa-clock  mr-1"></em>
                                                    <strong>15 hours tutoring english</strong>
                                                    out of 563 hours. </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="margin-top: 20px; ">
                                        <h3>About {{ $tutor->first_name }}</h3>
                                        <hr>
                                    </div>

                                    <div class="post clearfix">


                                        <span class="b_username">
                                            Bio
                                        </span>
                                        <!-- /.user-block -->
                                        <p>
                                            {{ $tutor->summary  }}
                                            {{-- I have more than 10 years of experience in teaching.
                                            I hold a Ph.D. and three Master's degrees in the
                                            fields of Physics, Electrical Engineering, Applied
                                            Mathematics, and Nuclear Engineering. I completed my
                                            graduate studies at UW-Madison and earned my B.S. at
                                            Princeton University. As such, the following is a
                                            non-comprehensive list of some of the subjects in
                                            which I have tutored past students. I am qualified
                                            to teach other subjects not listed, so please call
                                            or text me. --}}
                                        </p>

                                    </div>

                                    @if ( count($tutor->education) > 0 )
                                        <span class="b_username">
                                            Education
                                        </span>
                                        @foreach ($tutor->education as $education)
                                            <!-- /.user-block -->
                                            <p>{{ $education->institute }}</p>
                                            <p>{{ $education->certification }} | {{ $education->start_date }} - {{ $education->end_date }}</p>
                                        @endforeach
                                        <hr>
                                    @else
                                        {{-- There is no education --}}
                                    @endif
                                    {{-- <span class="b_username">
                                        Education
                                    </span>
                                    <!-- /.user-block -->
                                    <p>Princeton Univeristy Chemical Engineering</p>
                                    <p>University of Wisconsin - Madison PhD </p>
                                    <p>Electrical Engineering / Physics / Nuclear Engineering
                                        Masters </p> --}}

                                    
                                    <span class="b_username">
                                        Policies
                                    </span> <!-- /.user-block -->
                                    <p><i class="fas fa-dollar-sign"></i> Hourly Rate:
                                        <b>${{ $tutor->price_per_hour }}</b></br></p>
                                    <p>
                                        Rate details:<b> Sessions cancelled within 24 hours will
                                            be charged a one hour cancellation fee. Students who
                                            do not show will be charged a two hour cancellation
                                            fee.</b></p>

                                    <p><i class="fas fa-calendar-times"></i> Lesson
                                        cancellation: <b>24 hours notice required</b></br></p>
                                    <p><i class="fas fa-bookmark"></i> <a href="#">No background
                                            check</a></br></p>
                                    <p><i class="fas fa-award"></i> Your first lesson is backed
                                        by our <a href="#">Good Fit Guarantee</a></br></p>

                                    <hr>

                                    <span class="b_username">
                                        Schedule
                                    </span>


                                    <!-- /.user-block -->
                                    <div class="row">
                                        <p>
                                            <div class="col-md-6">
                                                <p>
                                                    <a href="javascript::" id="calender" ><b>Sunday:</b></a></br>
                                                    {{-- 10: PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[0]) )
                                                        {{ $tutor->availabilities[0]->start_time }} - {{ $tutor->availabilities[0]->end_time }}
                                                    @endif
                                                </p>

                                                <p>
                                                    <b>Monday:</b></br>
                                                    {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[1]) )
                                                        {{ $tutor->availabilities[1]->start_time }} - {{ $tutor->availabilities[1]->end_time }}
                                                    @endif
                                                </p>

                                                <p>
                                                    <b>Tuesday:</b></br>
                                                    {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[2]) )
                                                        {{ $tutor->availabilities[2]->start_time }} - {{ $tutor->availabilities[2]->end_time }}
                                                    @endif
                                                </p>

                                                <p>
                                                    <b>Wednesday:</b></br>
                                                    {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[3]) )
                                                        {{ $tutor->availabilities[3]->start_time }} - {{ $tutor->availabilities[3]->end_time }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <b>Thursday:</b></br>
                                                    {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[4]) )
                                                        {{ $tutor->availabilities[4]->start_time }} - {{ $tutor->availabilities[4]->end_time }}
                                                    @endif
                                                </p>

                                                <p>
                                                    <b>Friday:</b></br>
                                                    {{-- Midnight - 3:00 AM, 10:00 PM - Midnight --}}
                                                    @if ( !empty($tutor->availabilities[5]) )
                                                        {{ $tutor->availabilities[5]->start_time }} - {{ $tutor->availabilities[5]->end_time }}
                                                    @endif
                                                </p>
                                                <p>
                                                    <b>Saturday:</b></br>
                                                    {{-- Midnight - 3:00 AM --}}
                                                    @if ( !empty($tutor->availabilities[6]) )
                                                        {{ $tutor->availabilities[6]->start_time }} - {{ $tutor->availabilities[6]->end_time }}
                                                    @endif
                                                </p>
                                            </div>

                                        </p>

                                    </div>
                                    
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" data-whatever="@mdo">Availabilities</button>

                                    <hr>

                                    <span class="b_username">
                                        Subjects
                                    </span>

                                    <!-- /.user-block -->
                                    <p>
                                        <div class="row">
                                            @if ( count($tutor->subjects) > 0)
                                                @foreach ($tutor->subjects as $subject)
                                                    <div class="col-md-6">
                                                        <p>
                                                            <b>{{ $subject->name }}</b></br>
                                                            {{-- @foreach ($category->subjects as $subject) --}}
                                                                {{ $subject->description }}
                                                            {{-- @endforeach --}}
                                                        </p>
                                                        {{-- <p>
                                                            <b>Computer</b></br>
                                                            General Computer
                                                        </p> --}}
                                                        {{-- <p>
                                                            <b>Corporate Training</b></br>
                                                            General Computer, Microeconomics, Statistics
                                                        </p> --}}
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                            {{-- <div class="col-md-6">
                                                <p><b>Math</b></br>
                                                    <a href="#">Chemical Engineering</a>,
                                                    Electrical Engineering,
                                                    ACT Math, Algebra 1, Algebra 2, Calculus,
                                                    Geometry, Physics, Prealgebra, Precalculus,
                                                    SAT Math, Statistics </p>

                                                <p><b>Test Preparation</b></br>
                                                    ACT English, ACT Math, ACT Reading, ACT
                                                    Science, GRE, SAT Math, SAT Writing </p>
                                            </div> --}}
                                        </div>
                                    </p>

                                    <hr>

                                    <div style="margin-top: 20px; ">
                                        <h3>Ratings and Reviews</h3>
                                        <hr>
                                    </div>
                                    <span class="b_username">
                                        Rating
                                    </span>

                                    <p> 
                                        <span class="text-sm">
                                            {{-- <em class="fas fa-star text-warning"></em> --}}
                                            {{-- <em class="fas fa-star text-warning"></em> --}}
                                            {{-- <em class="fas fa-star text-warning"></em> --}}
                                            {{-- <em class="fas fa-star text-warning"></em> --}}
                                            {{-- <em class="fas fa-star text-warning"></em>  --}}
                                            <div class="my-rating-7 d-inline" data-rating="{{ $obtain_rating }}"></div>
                                            <div class="d-inline">
                                                {{ $obtain_rating }}  
                                                <a href="#" >( {{ $total_review }} Ratings)</a>
                                            </div>
                                            
                                        </span>
                                    </p>
                                    <!-- /.user-block -->
                                    
                                    <span>5 Star ({{ $five_star }})</span>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-valuenow="{{ $five_star_progress }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $five_star_progress }}%"></div>
                                    </div>


                                    <span>4 Star ({{ $four_star }})</span>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-valuenow="{{ $four_star_progress }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $four_star_progress }}%"></div>
                                    </div>

                                    <span>3 Star ({{ $three_star }})</span>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-valuenow="{{ $three_star_progress }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $three_star_progress }}%"></div>
                                    </div>


                                    <span>2 Star ({{ $two_star }})</span>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-valuenow="{{ $two_star_progress }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $two_star_progress }}%"></div>
                                    </div>


                                    <span>1 Star ({{ $one_star }})</span>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            aria-valuenow="{{ $one_star_progress }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $one_star_progress }}%"></div>
                                    </div>

                                    <hr>


                                    <span class="b_username">
                                        Reviews ({{ $total_review }})
                                    </span>

                                    <!-- /.user-block -->
                                    {{-- <p class="lead">Show reviews that mention</p> --}}
                                    <p>
                                        {{-- <form action="#" method="post">
                                            <div class="input-group">
                                                <input type="text" name="message"
                                                    placeholder="Search Reviews ..."
                                                    class="form-control">
                                                <span class="input-group-append">
                                                    <button type="submit"
                                                        class="btn btn-primary"><i
                                                            class="fas fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form> --}}

                                        <a href="{{ url('/student/tutor-all-review') }}/{{ $tutor->id }}" class="btn btn-primary"
                                            style=" margin-top:15px !important;">All Reviews</a>
                                        
                                        <button type="button" id="write_review" name="write_review" class="btn btn-primary"
                                            style=" margin-top:15px !important;">Write Review</button>
                                    </p>
                                    
                                {{-- Start Review Form --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{-- Error --}}
                                        <div class="alert error-message alert-danger alert-dismissible fade show review-error" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Error!</strong> Something went wronge, Please try later.
                                        </div>
                                        {{-- End Error --}}
                                        {{-- Success --}}
                                        <div class="alert error-message alert-success alert-dismissible fade show review-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Success!</strong> Your Review has been sumbitted.
                                        </div>
                                        {{-- End Success --}}
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <input type="hidden" class="form-control"
                                                    name="id" value="{{ $user->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="container border d-none review_form_toggle">
                                    <form id="review_form">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <input type="hidden" name="student_id" class="form-control"
                                                            value="{{ $user->id }}" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <input type="hidden" name="tutor_id" class="form-control"
                                                            value="{{ $tutor->id }}" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="d-inline">Stars Rating</label>
                                                <div class="my-rating-8 d-inline" data-rating="3">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="subject" class="form-control  @error('subject') is-invalid @enderror"
                                                            placeholder="Enter Subject" >
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('subject')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="error-message alert alert-danger error-sb" role="alert">
                                                    Error Message Goes Here
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Review</label>
                                                    <div class="input-group mb-2">
                                                        <textarea name="review" id="review" cols="200" rows="10" placeholder="Enter Review..."></textarea>
                                                    </div>
                                                </div>
                                                @error('review')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="error-message alert alert-danger error-re" role="alert">
                                                    Error Message Goes Here
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Button --}}
                                        <div class="card-footer text-left">
                                            <button id="submit_review" name="submit_review" class="btn btn-primary">
                                                <i class="fas fa-check"></i>
                                                    Submit Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                    {{-- End Review Form --}}
                                    
                                    @if ( count($tutor->reviews) > 0 )
                                        @php
                                             $count = 0;
                                        @endphp
                                        @foreach ($tutor->reviews->sortByDesc('id') as $review)
                                            @if ($count < 3)
                                                <p>
                                                    <div class="my-rating-7 d-inline" data-rating="{{ $review->star_rating }}"></div>
                                                    </br>
                                                    <b class="d-inline" >{{ $review->title }}</b>
                                                    </br>
                                                    {{ $review->description }} 
                                                    </br>
                                                    <span class="text-muted text-sm">
                                                        <em>Allison, 13 lessons with Nicole </em>
                                                    </span>
                                                </p>
                                            @endif
                                            @php
                                                $count += 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        The tutor has no review.
                                    @endif
                                    
                                    {{-- <hr>
                                    <div style="margin-top: 20px; ">
                                        <h3> <b>Other Fort Collins, CO Tutors</b></h3>
                                        <p> <a href="#">Fort Collins</a>, <a href="#">CO Math
                                                Tutors - Fort CollinsM</a>, <a href="#">CO Test
                                                Preparation Tutors - Fort Collins</a>, <a
                                                href="#">CO Computer Tutors - Fort Collins</a>,
                                            <a href="#">CO Language Tutors - Fort Collins</a>,
                                            <a href="#">CO Elementary Education Tutors - Fort
                                                Collins</a>, <a href="#">CO English Tutors -
                                                Fort Collins</a>, <a href="#">CO Art Lessons</a>
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{{-- End Left Larg Card --}}


{{-- Right Small Card --}}

<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card-style_mobile text-center"><a href="#"
            class="btn btn-primary"><strong>Contact {{ $tutor->first_name }}</strong></a>
        <p class="text-center"> Response time: <b>7 hours</b> </p>
    </div>


    <div class="card card-primary card-outline hide-card card-style card-style_desktop">
        <div class="card-body box-profile">
            <div class="text-center ">
                <img class="profile-user-img img-fluid img-circle img-bordered-sm"
                    src="{{ url('/') }}/{{ $tutor->images->path }}/{{ $tutor->images->name }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $tutor->first_name }} {{ $tutor->last_name }}</h3>

            <p class="text-center lead"><strong>${{ $tutor->price_per_hour }}</strong>/hour</p>

            <ul class="list-group list-group-unbordered mb-3 text-center">
                <li class="list-group-item">No subscriptions or upfront payments </li>
                <li class="list-group-item">
                    Only pay for the time you need
                </li>
                <li class="list-group-item">
                    Find the right fit, or your first hour is free
                </li>
            </ul>
            {{-- <input type="text" name="message" id="message" value="Hi" /> --}}
            <a href="{{ url('student/message/send') }}/{{ $user->id }}/{{ $tutor->id }}/Hi" class="btn btn-primary btn-block"><strong>Contact {{ $tutor->first_name }}</strong></a>
            <p class="text-center"> Response time: <b>7 hours</b> </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.card-body -->

{{-- End Right Small Card --}}


{{-- Start Rating SVG Master --}}
{{-- <script src="{{ asset('theme_asset/star-rating-svg-master/src/jquery.star-rating-svg.js') }}"></script> --}}
<!-- jQuery -->
{{-- <script src="{{ asset('theme_asset/profile/plugins/jquery/jquery.min.js') }}"></script> --}}
<script>
// jQuery(".my-rating-8").starRating({
//     totalStars: 5,
//     starShape: 'rounded',
//     starSize: 30,
//     emptyColor: 'lightgray',
//     hoverColor: '#FFD700',
//     activeColor: '#FFC107',
//     ratedColor: '#FFC107',
//     useGradient: false,
//     useFullStars: true,
//     // setRating: 3,
//     // initialRating: 3,
//     // callback: function(currentRating, $el){
//     //     // alert('rated ' + currentRating);
//     //     WriteReview (currentRating);
//     //     // console.log('DOM element ', getRating);
//     // }
// });
// // Only read able rating
// jQuery(".my-rating-7").starRating({
//     totalStars: 5,
//     starShape: 'rounded',
//     activeColor: '#FFC108',
//     starSize: 20,
//     useGradient: false,
//     readOnly: true
// });
</script>

