<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media only screen and (max-width: 620px) {
        /* For mobile phones: */
            .menu, .main, .right {
                width: 100%;
            }
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PsychCare2.0</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/appedited.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/7.0.0/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <main class="py-4">

            <div id="app">
                <header>
                    <a href="#" class="logo">Manage Accounts</a>
                    <ul>
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage Accounts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">List of Accounts</a>
                                    <a class="dropdown-item" href="{{ url('addcouncilor') }}">Add Councilor</a>
                                  <a class="dropdown-item" href="{{ url('addstudent') }}">Add Student</a>
                                </div>
                              </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage Course
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ url('course') }}">List of Courses</a>
                                  <a class="dropdown-item" href="{{ url('addcourse') }}">Add Course</a>
                                </div>
                              </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                              </div>
                        </li>
                    </ul>
                </header>
                @include('partials.alerts')
                    <div class="container">
                        <div class="formcard">
                            <div class="card-body">
                                <form method="POST" id="addaccount" action="{{ route('addcouncilor')}}">
                                                        @csrf
                                <div class="row">
                                    <div class="col-8 col-sm-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">First Name</span>
                                            <input type="text" id="fname" name="fname" placeholder="First Name" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Middle Name</span>
                                            <input type="text" id="fname" name="mname" placeholder="Middle Name" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Last Name</span>
                                            <input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" id="year" name="year" value="0" class="form-control" hidden>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">ID Number</span>
                                            <input type="text" id="idnum" name="idnum" placeholder="ID Number" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Email</span>
                                            <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Password</span>
                                            <input type="text" id="password" name="password" placeholder="Passwword" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Confirm Password</span>
                                            <input type="text" id="password-confirm" name="password-confirm" placeholder="Confirm Password" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" form="addaccount">Submit Account</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

        </main>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
