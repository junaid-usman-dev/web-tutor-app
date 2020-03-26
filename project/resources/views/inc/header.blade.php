
<div class="container-fluid">
    <div class="container">
        <nav class="reg reg-expand-lg reg-light ju-header-background">
            <a class="reg-brand" href="#"><img src="{{ asset('theme_asset/home/images/tl_logo.png') }}"></a>
            <button class="reg-toggler" type="button" data-toggle="collapse"
                data-target="#regSupportedContent" aria-controls="regSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="reg-toggler-icon"></span> </button>
            <div class="collapse justify-content-end reg-collapse" id="regSupportedContent">
                <ul class="reg-navi">
                    <li class="navi-item"> <a class="btnn btnn-info active" href="#">Find A Tutor</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-info" href="#">How it Works</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-info" href="#">Resources</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-info" href="#">Start Tutoring</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-info" href="{{ url('/about') }}">About Us</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-warning" href="{{ url('/signin') }}">Sign in</a> </li>
                    <li class="navi-item "> <a class="btnn btnn-warning" href="{{ url('/signup') }}">Sign up</a> </li>
                </ul>

            </div>
        </nav>
    </div>
</div>