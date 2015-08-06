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
    <div class="main_content row">
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

            <div class="row">

                <div class='tab-container'>
                    <ul class='tabs'>
                        <li><a href='#tab-list'>List</a></li>
                        <li><a href='#tab-create'>Create</a></li>
                    </ul>
                    <div id='tab-list'>
                        <div id='appointment-list' class='list-container'></div>
                    </div>
                    <div id='tab-create'>
                        <div class='form-row'>
                            <div class='form-label'>Date</div>
                            <div class='form-data'>
                                <input type='date' name='date'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Start Time</div>
                            <div class='form-data'>
                                <input type='time' name='startTime'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>End Time</div>
                            <div class='form-data'>
                                <input type='time' name='startTime'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Gap</div>
                            <div class='form-data'>
                                <input type='time' name='startTime'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </div>
                </div>
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
@include('includes.expert-admin-footer')

{{HTML::script(asset("/public/js/tablesorter.js"))}}
{{HTML::script(asset("/public/js/moment.min.js"))}}
{{HTML::script(asset("/public/js/fullcalendar.min.js"))}}
{{HTML::script(asset("/public/js/site/tab.js"))}}
{{HTML::script(asset("/public/js/site/expert/manage-appointments.js"))}}

</body>
</html>