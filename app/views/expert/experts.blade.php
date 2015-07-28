<!doctype html>
<html lang="en">
<head>
    @include('includes.common_css')

    {{HTML::style(asset("/public/css/site/flexslider.css"))}}

    @include('includes.common_js_top')
</head>
<body>

@include('includes.header')

<!-- FILTER STARTS FROM HERE -->
<div class="filter row">
    @include('includes.search')
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

        @if($found)

        @foreach($experts as $expertObj)

            <?php
                $expert = get_object_vars($expertObj);

                if (isset( $expert['image_name'])) {
                    $expertPic = asset('public/uploads/experts/' . $expert['id'] . '/' .  $expert['image_name']);
                    $fileLocation = public_path() . '\\uploads\\experts\\' . $expert['id'] . '\\' .  $expert['image_name'];

                    if (!file_exists($fileLocation))
                        $expertPic = asset('public/images/expert.jpg');
                } else
                    $expertPic = asset('public/images/expert.jpg');
            ?>

        <div class="column four">
            <div class="expert">
                <div class="expert_img">
                    {{HTML::image(asset($expertPic))}}
                </div>
                <div class="expert_details">
                    <p class="name">{{$expert['first_name']}} {{$expert['last_name']}}</p>
                    <p class="qualification">MD, MBBS</p>
                    <p class="specialities">Heart Surgeon</p>
                    <p class="fee">Rs 500/-</p>
                    <p class="rating">
                    </p>
                    <p><span class="fa fa-map-marker"></span> {{$expert['city']}}</p>
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

        @endforeach

        @endif

    </div>
</div>

@include('includes.footer')

{{HTML::script(asset("/public/js/site/experts.js"))}}
{{HTML::script(asset("/public/js/site/login.js"))}}

</body>
</html>

