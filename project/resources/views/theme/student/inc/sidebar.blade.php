<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('student.dashboard') }}" class="brand-link navbar-white">
        <img src="{{ asset('theme_asset/dist/img/TLLogo.png') }}" alt="TutorLynx Logo"
            class="brand-image img-circle" style="opacity: 1">
        <span class="brand-text font-weight-light"><img
                src="{{ asset('theme_asset/dist/img/TL_txt_img.png') }}"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/') }}/{{ $user->images->path }}/{{ $user->images->name }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('student.dashboard') }}" class="d-block">{{ $user->first_name }} {{ $user->last_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
  
                <li class="nav-item">
                    <a href="{{ url('/student/tutor-list') }}" class="nav-link"><em class="nav-icon fas fa-users"></em>
                        <p>
                            Find Tutors
                            <!--  <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.favorite.tutors.list') }}" class="nav-link"><em class="nav-icon fas fa-heart"></em>
                        <p>
                            Favorite Tutors
                            <!--  <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('student.edit.profile') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Mode</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.payment') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Mode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                To change your mode, The system will logout your student account and login again as a tutor.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('change.mode') }}" type="button" class="btn btn-primary">OK, Logout Me</a>
            </div>
        </div>
    </div>
</div>