
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><strong>{{ count($tutors) }} tutors</strong> fit to your choice
        </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">

                <div class="row">
                    <div class="col-12">

                        @if ( count($tutors) > 0 )

                        @foreach ($tutors as $tutor)
                        <div class="post">
                            <div class="user-block"><span
                                    class="badge text-md badge-primary float-right">${{ $tutor->price_per_hour }}/hr</span>
                                <img class="img-circle img-bordered-sm"
                                    src="{{ url('/') }}/{{ $tutor->images->path }}/{{ $tutor->images->name }}"
                                    alt="user image">
                                <span class="username">
                                    <a href="{{ url('student/tutor-profile') }}/{{ $tutor->id }}">{{ $tutor->first_name }}
                                        {{ $tutor->last_name }}</a>
                                </span>
                                <span class="description">
                                    {{-- foreach ($user->categories as $category) --}}
                                    {{-- foreach ($category->subjects as $subject) --}}
                                    @if ( count($tutor->subjects) > 0)
                                        {{-- @foreach ($tutor->categories as $category) --}}
                                            @foreach ($tutor->subjects as $subject)
                                                {{ $subject->name }},
                                            @endforeach

                                            {{-- {{ $subject->name }}, --}}
                                        {{-- @endforeach --}}
                                    @endif
                                    
                                </span>

                            </div>
                            <!-- /.user-block -->
                            <p>
                                {{ $tutor->summary }}
                            </p>

                            <span class="text-sm">
                                {{-- <i class="fas fa-star  text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i> --}}
                                @php
                                    $total_rating = 0;
                                    $obtain_rating = 0.0; // Obtain rating out of 5
                                    $number_of_ratings = 0;
                                    $total_review = 0; // Total Reviews
                                @endphp
                                @foreach ($tutor->reviews as $review) 
                                    @php
                                        $total_review = count($tutor->reviews);
                                        $number_of_ratings = count($tutor->reviews)*5;
                                        $total_rating += intval($review->star_rating); // calculating total reviews
                                    @endphp
                                @endforeach
                                @php
                                    if ($number_of_ratings != 0) {
                                        $obtain_rating = ($total_rating/$number_of_ratings)*5; // obtaining rating reviews percentage out of 5
                                    }
                                @endphp

                                <div class="my-rating-7 d-inline" data-rating="{{ $obtain_rating }}"></div>
                                {{ number_format($obtain_rating,1) }} ({{ $total_review }})
                            </span>
                            <p class="text-sm"> <em class="fas fa-clock  mr-1"></em>
                                <strong>15 hours tutoring english</strong> out of 563 hours. </p>
                        </div>
                        @endforeach
                        @else
                        <p>Result does not match to your choice.</p>
                        @endif

                        {{-- <div class="post">
                            <div class="user-block"><span
                                    class="badge text-md badge-primary float-right">$50/hr</span>
                                <img class="img-circle img-bordered-sm"
                                    src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}"
                        alt="user image">
                        <span class="username">
                            <a href="#">English Writing Teacher with
                                Patience</a>
                        </span>
                     

                        <span class="description">Jonathan Burke Jr.</span>

                    </div>
                    <!-- /.user-block -->
                    <p>
                        Lorem ipsum represents a long-held tradition for
                        designers,
                        typographers and the like. Some people hate it and
                        argue for
                        its demise, but others ignore.
                    </p>
                    <span class="text-sm"><i class="fas fa-star  text-warning"></i><i
                            class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                            class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i> 5.0
                        (320)</span>
                    <p class="text-sm"> <em class="fas fa-clock  mr-1"></em>
                        <strong>15 hours tutoring english</strong> out of
                        563 hours. </p>
                </div>

                <div class="post">
                    <div class="user-block"><span class="badge text-md badge-primary float-right">$48/hr</span>
                        <img class="img-circle img-bordered-sm"
                            src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}" alt="user image">
                        <span class="username">
                            <a href="#">English Writing Teacher with
                                Patience</a>
                        </span>
                        <span class="description">Sarah Ross</span>

                    </div>
                    <!-- /.user-block -->
                    <p>
                        Lorem ipsum represents a long-held tradition for
                        designers,
                        typographers and the like. Some people hate it and
                        argue for
                        its demise, but others ignore.
                    </p>
                    <span class="text-sm"><i class="fas fa-star  text-warning"></i><i
                            class="fas  fa-star  text-warning"></i><i class="fas fa-star  text-warning"></i><i
                            class="fas fa-star text-warning"></i><i class="fas fa-star ligther_txt"></i> 4.0
                        (300)</span>
                    <p class="text-sm"> <em class="fas fa-clock  mr-1"></em>
                        <strong>15 hours tutoring english</strong> out of
                        563 hours. </p>
                </div>

                <div class="post">
                    <div class="user-block"><span class="badge text-md badge-primary float-right">$37/hr</span>
                        <img class="img-circle img-bordered-sm"
                            src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                            <a href="#">English Writing Teacher with
                                Patience</a>
                        </span>
                        <span class="description">Jonathan Burke Jr.</span>

                    </div>
                    <!-- /.user-block -->
                    <p>
                        Lorem ipsum represents a long-held tradition for
                        designers,
                        typographers and the like. Some people hate it and
                        argue for
                        its demise, but others ignore.
                    </p>
                    <span class="text-sm"><i class="fas fa-star  text-warning"></i><i
                            class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                            class="fas fa-star text-warning"></i><i class="fas fa-star ligther_txt"></i> 4.0
                        (300)</span>
                    <p class="text-sm"> <em class="fas fa-clock  mr-1"></em>
                        375 hours tutoring </p>
                </div> --}}

                {{-- <div class="post">
                            <div class="user-block"><span
                                    class="badge text-md badge-primary float-right">$35/hr</span>
                                <img class="img-circle img-bordered-sm"
                                    src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}"
                alt="user image">
                <span class="username">
                    <a href="#">English Writing Teacher with
                        Patience</a>
                </span>
                <span class="description">Sarah Ross</span>

            </div>
            <!-- /.user-block -->
            <p>
                Lorem ipsum represents a long-held tradition for
                designers,
                typographers and the like. Some people hate it and
                argue for
                its demise, but others ignore.
            </p>
            <span class="text-sm"><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                    class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                    class="fas fa-star ligther_txt"></i> 4.0
                (300)</span>
            <p class="text-sm"> <em class="fas fa-clock  mr-1"></em>
                <strong>15 hours tutoring english</strong> out of
                563 hours. </p>
        </div> --}}

        <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

</div>
</div>


<script>
    // jQuery(".my-rating-8").starRating({
    //     totalStars: 5,
    //     starShape: 'rounded',
    //     starSize: 30,
    //     emptyColor: 'lightgray',
    //     hoverColor: 'salmon',
    //     activeColor: 'crimson',
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
    // Only read able rating
    $(".my-rating-7").starRating({
        totalStars: 5,
        starShape: 'rounded',
        activeColor: '#FFC108',
        starSize: 20,
        useGradient: false,
        readOnly: true
    });
    
</script>