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
                <div class="formcard col-8">
                    <div class="card-body">
                        <form method="PUT" id="addaccount" action="{{ route('course.create')}}">
                                                @csrf
                        <div class="row g-3 align-items-center">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Course Name</span>
                                <input type="text" id="course_name" name="course_name" placeholder="Course Name" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="dept_id" >Department</label>
                                        <select class="form-select" id="dept_id" name="dept_id">
                                            <option>Choose Department</option>
                                            @foreach ($depts as $dept)
                                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="modal-footer">
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
