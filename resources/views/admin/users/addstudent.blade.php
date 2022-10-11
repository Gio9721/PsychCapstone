@extends('layouts.app')

@section('content')
<section>
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
            </ul>
        </header>
        @include('partials.alerts')
            <div class="container">
                <div class="formcard">
                    <div class="card-body">
                        <form method="PUT" id="addaccount" action="{{ route('user.create')}}">
                                                @csrf
                        <div class="row">
                            <div class="col-8 col-sm-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">First Name</span>
                                    <input type="text" id="fname" name="fname" value="First Name" class="form-control">
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
                                    <label class="input-group-text" for="course" >{{ __('Course') }}</label>
                                        <select class="form-select" id="course" name="course">
                                            <option>Choose Course</option>
                                            @foreach ($course as $courses)
                                                <option value="{{$courses->id}}">{{$courses->course_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="year" >{{ __('Year') }}</label>
                                        <select class="form-select" id="year" name="year">
                                            <option value="1st Year">1st Year</option>
                                            <option value="2nd Year">2nd Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                            <option value="4th Year">5th Year</option>
                                        </select>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="addaccount">Submit Account</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>


        </main>
    </div>
    <script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </script>
@endsection
