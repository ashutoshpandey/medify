<!doctype html>
<html lang="en">
<head>
    @include('includes.common_css')

    {{HTML::style(asset("/public/css/site/flexslider.css"))}}

    @include('includes.common_js_top')
</head>
<body>

@include('includes.header')

<div class="filter page_listing row">
    <div class="row">
        <div class="column three  location_search">
            <div class="row">
                <input type="text" name="location" placeholder="location"/>

                <p class="location_icon"><span class="fa fa-map-marker"></span></p>

                <div class="locations">
                    <p><span class="fa fa-map-marker"></span> Prateek Laurel sector 120, Noida</p>

                    <p><span class="fa fa-map-marker"></span> Prateek Laurel sector 120, Delhi</p>

                    <p><span class="fa fa-map-marker"></span> Prateek Laurel sector 120, Noida</p>

                    <p><span class="fa fa-map-marker"></span> Prateek Laurel sector 120, Mumbai</p>
                </div>
            </div>
        </div>
        <div class="column four  expert_search">
            <div class="row">
                <input type="text" name="search" placeholder="Search by Expert name, Speciality"/>

                <div class="search_content">
                    <p><b>Rajan Kumar</b> in Heart surgery</p>

                    <p><b>Rajan Kumar</b> in Physiotherapy</p>
                </div>
            </div>
        </div>
        <div class="column three  appointment_modes">
            <input type="hidden" name="mode"/>

            <div class="row">
                <div class="selected"><p><span>Select Mode of appointment</span></p> <span class="arrow"></span>
                </div>
                <div class="modes">
                    <p>Online consultation</p>

                    <p>Home visit</p>
                </div>
            </div>
        </div>
        <div class="column two">
            <button>Search</button>
        </div>
    </div>

</div>

<div class="sec_filter row">
    <div class="fixed_width_container">
        <div class="column four">
            <p>AVAILABILITY</p>

            <div class="days_availability row">
                <span>SUN</span><span>MON</span><span>TUE</span><span>WED</span><span>THR</span><span>FRI</span><span>SAT</span>
                <span id="current_day"></span>
            </div>
        </div>
        <div class="column four">
            <p>CONSULTATION FEE</p>
            <div id="slider"></div>
            <div><span id="min_value"></span>-<span id="max_value"></span> </div>
        </div>
        <div class="column four">
            <p>Online Consultation</p>
            <div class="row method_availability">
                <div class="method">
                    <span><input type="checkbox" /></span> Tele Consultation
                </div>
                <div class="method">
                    <span><input type="checkbox" /></span> Video Consultation
                </div>
                <div class="method">
                    <span><input type="checkbox" /></span> Written Advice
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed_width_container expert_listing">
    <div class="row">
        <div class="column four">
            <div class="expert">
                <div class="expert_img">
                    {{HTML::image(asset("public/images/expert.jpg"))}}
                </div>
                <div class="expert_details">
                    <p class="name">Dr. Abhay Aggarwal</p>
                    <p class="qualification">MD, MBBS</p>
                    <p class="specialities">Heart Surgeon</p>
                    <p class="fee">Rs 500/-</p>
                    <p class="rating">
                    </p>
                    <p><span class="fa fa-map-marker"></span> Noida</p>
<!--                    <button class="book_now"><span class="fa fa-calendar"></span> BOOK NOW</button>-->

                    <div class="methods">
                        <span class="active"><i class="flaticon-telephone90"></i></span>
                        <span><i class="flaticon-laptop135"></i></span>
                        <span class="active"><i class="flaticon-lists13"></i></span>
                    </div>
                    <div class="booking">
                        <a href="{{$root}}/expert/1"><span class="fa fa-eye"></span> View profile</a>
                        <a href="#"><span class="fa fa-calendar"></span> Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{HTML::script(asset("/public/js/site/experts.js"))}}

@include('includes.footer')


</body>
</html>

