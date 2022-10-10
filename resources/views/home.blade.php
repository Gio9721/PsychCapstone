@extends('layouts.app')
@section('content')
        @hasrole('admin')
        <div id="app">
            <header>
                <a href="#" class="logo">Manage Accounts</a>
                <ul>
                    <li><a href="{{ route('admin.users.index') }}">Home</a></li>
                    <li><a href="{{ url('addstudent') }}">Add Student</a></li>
                    <li><a href="{{ url('addcouncilor') }}">Add Councilor</a></li>
                    <li><a href="{{ url('addcourse') }}">Add Course</a></li>
                    <li><a href="{{ url('course') }}">Course</a></li>
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
                                            <td>{{ $user->course }}</td>
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
                                                <option>{{$user->course}}</option>
                                                <optgroup label="Bachelor of Science">
                                                        <option value="IT">Information Technology(IT)</option>
                                                        <option value="ICT">Information and Communication Technologies(ICT)</option>
                                                        <option value="CS">Computer Science(CS)</option>
                                                        <option value="IE">Industrial Engineering(IE)</option>
                                                        <option value="CE">Computer Engineering(CE)</option>
                                                </optgroup>
                                                <optgroup label="Engineerings">
                                                    <option value="comp">Computer</option>
                                                    <option value="gols">Gols</option>
                                                    <option value="ind">Industrial</option>
                                                </optgroup>
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
        @endhasrole

                @hasrole('student')
                <div class="studentbody">
<section>
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
             <li><a href="{{ url('home') }}" class="active">Home</a></li>
             <li><a href="{{ url('exams_history') }}">Exam History</a></li>
             <li><a href="{{ url('stdntappointment') }}">Appointment</a></li>
             <li><a href="{{ url('appointment_history') }}">My Appointments</a></li>
         </ul>
     </header>
     <div class="content">
                    <div class="container-fluid">
                                <div class="homecard">
                                    <div class="card-body">
                                    <center><img src="{{ asset('img/wellness.png') }}"></center>
                                    <div class="card2">
           <div class="imgBox">
            <img src="{{ asset('img/wellnesslogo.png') }}">
            </div>
            <div class="details">
                <div class="a"><a href="{{ url('wellness') }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Read
                    </a></div>
            </div>
        </div>
        <div class="cardcontainer">
        <div class="card-body">
            <center><img src="{{ asset('img/exams.png') }}"></center>
                <div class="card2">
                        <div class="imgBox">
                            <img src="{{ asset('img/stresslogo.png') }}">
                        </div>
                        <div class="details">
                                <div class="a"> <a href="{{ url('stress_exam') }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Take Test
                    </a></div>
                </div>
            </div>
                <div class="card2">
                        <div class="imgBox">
                            <img src="{{ asset('img/learnerslogo.png') }}">
                        </div>
                        <div class="details">
                                <div class="a"><a href="{{ url('learner_exam') }}">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Take Test
                        </a>
                        </div></div>
                    </div>
                    <div class="container2">
                        <div class="card2">
                        <div class="imgBox">
                            <img src="{{ asset('img/personalitylogo.png') }}">
                        </div>
                        <div class="details">
                                <div class="a"><a href="{{ url('personality_exam') }}">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Take Test
                        </a></div>
                        </div>
                    </div>
         </div>
</div>


                </div>
            </div>

    </section>

                @endhasrole
                @hasrole('user')
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">

                    Wait for the admin to verify your accout.
                @endhasrole

                </div>
            </div>
        </div>
    </div>
</div>
                @hasrole('councilour')
                <section>
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
             <li><a href="{{ url('home') }}" class="active">Home</a></li>
             <li><a href="{{ url('viewquestions') }}">Questions</a></li>
             <li><a href="{{ url('viewtime') }}">List of Appointments</a></li>
             <li><a href="{{ url('myfinishappointments') }}">Completed Appointments</a></li>
         </ul>
     </header>
     <div class="content">
                    <div class="container-fluid">
                                <div class="homecard">
                                <canvas id="pie-chart" width="800" height="400"></canvas>
                                <input type="hidden" id="accept" value="{{$accept}}"/>
                                <input type="hidden" id="pending" value="{{$pending}}"/>
                                <input type="hidden" id="total" value="{{$total}}"/>
                                <script src="js/piechart.js"></script>


                @endhasrole
@endsection
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>
