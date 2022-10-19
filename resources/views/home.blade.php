@extends('layouts.app')
@section('content')
        @hasrole('admin')
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
            <div class="container text-center">
                <div class="row justify-content-center mt-5 pt-5">
                    <div class="col-4">
                        <div class="card border-info bg-info text-center mb-3" style="max-width: 25rem;">
                            <div class="card-header text-success">
                                <h3>Accounts</h3>
                            </div>
                            <div class="card-body text-white">
                              <h1>{{$nousers}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-info bg-info text-center mb-3" style="max-width: 25rem;">
                            <div class="card-header text-success">
                                <h3>Courses</h3>
                            </div>
                            <div class="card-body text-white">
                              <h1>{{$numcourses}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-info bg-info text-center mb-3" style="max-width: 25rem;">
                            <div class="card-header text-success">
                                <h3>Approved Appointments</h3>
                            </div>
                            <div class="card-body text-white">
                              <h1>{{$appointments}}</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
                                {{-- <input type="hidden" id="accept" value="{{$accept}}"/>
                                <input type="hidden" id="pending" value="{{$pending}}"/>
                                <input type="hidden" id="total" value="{{$total}}"/> --}}
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
