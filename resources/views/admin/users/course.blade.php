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
            <div class="row justify-content-center">
                    <div class="formcard">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <div class="panel-body">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </div>
                                </thead>
                                <tbody id="dynamic-row">
                                    @foreach($course as $courses)
                                        <tr>
                                        <td>{{ $courses->id }}</td>
                                        <td>{{ $courses->course_name }}</td>
                                        <td>{{ $courses->department }}</td>
                                        <td>
                                            <form action="{{ route('course.destroy', $courses->id) }}" method="POST" class="float-left">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>


        </main>
    </div>
@endsection
