<!DOCTYPE HTML>
<html>
<head>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    @include('includes.common_css')
    {{HTML::style(asset("/public/css/site/fullcalendar.css"))}}
    {{HTML::style(asset("/public/css/site/flexslider.css"))}}
    {{HTML::style(asset("/public/css/site/dashboard.css"))}}

    {{HTML::style(asset("/public/css/site/flexslider.css"))}}

    @include('includes.common_js_top')

</head>
<body>
<header>
    <div class="logo">
        <a href="{{$root}}/expert-dashboard">{{HTML::image(asset("public/images/logo.png"))}}</a>
    </div>
    <div class="nav_menu">
        <div class="top_nav row">
            <a href="#">{{HTML::image(asset("public/" . $expertImage))}} Hi {{$expert_name}} !</a> <a href="{{$root}}/logout">Sign Out</a>
        </div>
    </div>
</header>

<div class="body_compensator"></div>

<div class="row column">
    @include('includes.expert.menu')
    <div class="main_content">
        <div class="row">

            <div class="row">
                <div class=" column date">
                    July 17,2015
                </div>
                <div class="digital_clock">
                    07:30 AM
                </div>
            </div>

            <div class="row">
                <div class="row today_work">
                    <p>Manage Appointments</p>
                </div>
            </div>

            <div class="row appointment_list">
                <table id="myTable" class="tablesorter">
                    <caption>Upcoming appointments
                        <div class="appointment_modes">
                            <div class="selected_mode">
                                <p>Filter by appointment</p>
                                <span></span>
                            </div>
                            <div class="modes">
                                <p>Online consultancy</p>

                                <p>Online consultancy</p>

                                <p>Online consultancy</p>

                                <p>Online consultancy</p>
                            </div>
                        </div>
                    </caption>
                    <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient Name</th>
                        <th>sex</th>
                        <th>Age</th>
                        <th>attachments</th>
                        <th>Time scheduled</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#52266</td>
                        <td>Rajesh Sharma</td>
                        <td>Male</td>
                        <td>32</td>
                        <td>report.jpg</td>
                        <td>02:30PM</td>
                    </tr>
                    <tr>
                        <td>#52266</td>
                        <td>Virjesh Sharma</td>
                        <td>Male</td>
                        <td>32</td>
                        <td>report.jpg</td>
                        <td>02:30PM</td>
                    </tr>
                    <tr>
                        <td>#52266</td>
                        <td>Radha Sharma</td>
                        <td>Female</td>
                        <td>32</td>
                        <td>report.jpg</td>
                        <td>02:30PM</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <button class="toggle_calendar">Calendar</button>
        <div class="calendar_container">
    <span class="close_calendar">
        <svg height="45px" width="45px">
            <use xlink:href="#cross"/>
        </svg>
    </span>

            <div id="calendar"></div>
        </div>
    </div>
</div>
@include('includes.footer')

{{HTML::script(asset("/public/js/tablesorter.js"))}}
{{HTML::script(asset("/public/js/moment.min.js"))}}
{{HTML::script(asset("/public/js/fullcalendar.min.js"))}}
{{HTML::script(asset("/public/js/site/expert/dashboard.js"))}}

</body>
</html>