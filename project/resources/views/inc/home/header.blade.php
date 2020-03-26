<div class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('theme_asset/home/images/tl_logo.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="btn btn-info active" href="#">Find A Tutor</a> </li>
                    <li class="nav-item "> <a class="btn btn-info" href="#">How it Works</a> </li>
                    <li class="nav-item "> <a class="btn btn-info" href="#">Resources</a> </li>
                    <li class="nav-item "> <a class="btn btn-info" href="#">Start Tutoring</a> </li>
                    <li class="nav-item "> <a class="btn btn-info" href="{{ url('/about') }}">About Us</a> </li>
                    <li class="nav-item "> <a class="btn btn-warning" href="{{ url('/signin') }}">Sign in</a> </li>
                    <li class="nav-item "> <a class="btn btn-warning" href="{{ url('/signup') }}">Sign up</a> </li>
                </ul>

            </div>
        </nav>
    </div>
</div> 