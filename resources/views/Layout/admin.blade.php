<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <title>Admin-Dashboard</title>

    <!-- Styles -->
    @yield('styles')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/plugins/pace/pace.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/plugins/highlight/styles/github-gist.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/plugins/dropzone/min/dropzone.min.css')}}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{asset ('assets/css/main.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset ('assets/css/darktheme.css')}}" rel="stylesheet"> --}}
    <link href="{{asset ('assets/css/custom.css')}}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/neptune.png" />
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Admin Dashboard
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Admin<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="">Create Admin</a>
                            </li>
                            <li>
                                <a href="">All Admin</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Experience<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/experience/create') }}">Create Experience</a>
                            </li>
                            <li>
                                <a href="{{ url('/experience') }}">All Experience</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Project<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/project/create') }}">Create Project</a>
                            </li>
                            <li>
                                <a href="{{ url('/project') }}">All Project</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Organizational<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/organization/create') }}">Create Organizational</a>
                            </li>
                            <li>
                                <a href="{{ url('/organization') }}">All Organizational</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">star</i>Service<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/service/create') }}">Create Service</a>
                            </li>
                            <li>
                                <a href="{{ url('/service') }}">All Service</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">

                        <a class="navbar-brand" href="#">Dashboard</a>


                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">

                            <div class="navbar-nav">
                                <span class="nav-link">Selamat Datang, User!</span>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Javascripts -->
   @yield('script')
<script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('assets/plugins/idle-timer/idle-timer.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>



</body>

</html>
