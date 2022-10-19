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
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-wrap:wrap">
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
                    <input type="text" id="search"class="form-control" placeholder="search" style="width: 15rem"/>
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
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Role</th>
                                    {{-- <th scope="col">Edit</th> --}}
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </div>
                                </thead>
                                <tbody id="dynamic-row">
                                    @foreach($users as $user)
                                        <tr>
                                        <td>{{ $user->idnum }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->roles }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-id="{{$user->id}}" data-bs-target="#viewModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
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
            <div class="modal fade">

            </div>

            <!-- View & Edit Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Account Information</h5>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">ID Number</span>
                                <input type="text" id="idnum" name="idnum" value="{{$user->idnum}}" class="form-control" required>
                            </div>
                        </div>
                        {{-- <div class="col-4 col-sm-6">
                        </div> --}}
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">First, middle and last name</span>
                                <input type="text" aria-label="First name" class="form-control" value="{{$user->fname}}">
                                <input type="text" aria-label="Middle name" class="form-control" value="{{$user->mname}}">
                                <input type="text" aria-label="Last name" class="form-control" value="{{$user->lname}}">
                            </div>
                        </div>
                        <div class="col-8 col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Email</span>
                                <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="year" >{{ __('Year') }}</label>
                                    <select class="form-select" id="year" name="year">
                                        <option>{{$user->year}}</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Role</span>
                                <input type="text" id="role" name="role" value="{{$user->role}}" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="course" >{{ __('Course') }}</label>
                                        <select class="form-select" id="course" name="course">
                                            <option value="{{$user->course_id}}"></option>
                                            @foreach ($courses as $course)
                                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        </div>


            <script type="text/javascript">
            $('body').on('keyup', '#search', function(){
                var searchQuest = $(this).val();

                $.ajax({
                        method:'POST',
                        url:"{{route ('admin.users.index.action') }}",
                        dataType:'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            searchQuest: searchQuest,
                        },
                        success:function(res){
                            var tableRow = '';
                            $('#dynamic-row').html('');

                            $.each(res, function(index, value){
                                tableRow = '<tr><td>'+value.idnum+'</td><td>'+value.lname+'</td><td>'+value.fname+'</td><td>'+value.roles+'</td><td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-id="{{$user->id}}" data-bs-target="#viewModal"><i class="fa fa-eye"></i></button></td><td><form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">{{ method_field('DELETE') }}@csrf<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></form></td></tr>';
                                $('#dynamic-row').append(tableRow);
                            });
                        }
                    });
                });
            </script>
    </div>
@endsection
