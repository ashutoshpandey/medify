<!doctype html>
<html lang="en">
<head>
    @include('includes.common_css')

    {{HTML::style(asset("/public/css/site/flexslider.css"))}}

    @include('includes.common_js_top')
</head>
<body>

@include('includes.header')

<div class="page_banner row">
    <img class="responsive" src="public/images/banner.jpg"/>

    <div class="overlay-text">

        <h1><span>Simplifying your path to health and wellness</span>
            <span>DISCOVER&mdash;CONNECT&mdash;MEET</span></h1>
    </div>
    <!-- FILTER STARTS FROM HERE -->
    <div class="filter row">
        @include('includes.search')
    </div>

</div>
<!-- FILTER ENDS HERE -->


<!-- EXPERT PERSONAL BOOKING SECTION STARTS HERE -->

<div class="section row">
    <div class="column six pad">
        <h1>Get second opinion from medical specialists.</h1>

        <p>Book appointment with top-notch medical specialist via tele or video cal to get second opinion.</p>
        <ul>
            <li>Get consultation summary.</li>
            <li>Get written medical advice from choosen specialist by sending reports &amp; queries.</li>
            <li>Save time &amp; money.</li>
        </ul>
        <button>Book appointment</button>
    </div>
    <div class="column six pad">
        <div class="icon">
            <span class="flaticon-telephone90"></span>

            <p>Tele Consultation</p>
        </div>
        <div class="icon">
            <span class="flaticon-laptop135"></span>

            <p>Video Consultation</p>
        </div>
        <div class="icon">
            <span class="flaticon-writing46"></span>

            <p>Written medical advice</p>
        </div>
    </div>
</div>
<div class="testimonials row">
    <p>This is a dummy testimonial. here we wil write customers testimonials.</p>

    <p>&mdash; Rajan Kumar</p>
</div>

<!-- EXPERT PERSONAL BOOKING SECTION ENDS HERE -->


<!-- SUPER SPECIALISTS BOOKING SECTION STARTS HERE -->

<div class="section row">
    <div class="column six pad">
        <h1>Get medical care delivered at your doorstep.</h1>

        <p>Book appointment with highly trained medical care professional to treat you at the comfort of your home.</p>
        <ul>
            <li>Choose from vast pool of medical care professionals.</li>
            <li>Schedule appointment at a time that's convenient fro you.</li>
            <li>Know about your expert &amp; talk to them before their visit, to have more transparency.</li>
            <li>Save time &amp; money.</li>
        </ul>

        <button id="personal_visit">Book appointment</button>
    </div>
    <div class="column six pad">
        <div class="icon">
            <span class="physiotherapy-icon"></span>

            <p>Physiotherapy</p>
        </div>
        <div class="icon">
            <span class="flaticon-patient2"></span>

            <p>Nursing</p>
        </div>
        <div class="icon">
            <span class="flaticon-medical64"></span>

            <p>Doctor</p>
        </div>
    </div>
</div>
<div class="testimonials row">
    <p>This is a dummy testimonial. here we wil write customers testimonials.</p>
</div>

<!-- SUPER SPECIALISTS BOOKING SECTION ENDS HERE -->

<script type="text/javascript">
    $(document).ready(function () {
        var wh = $(window).height();
        $(".section").css('min-height', wh - 130);
    });
    $(window).resize(function () {
        var wh = $(window).height();
        $(".section").css('min-height', wh - 130);
    });
</script>

@include('includes.footer')
{{HTML::script(asset("/public/js/site/search.js"))}}
{{HTML::script(asset("/public/js/site/login.js"))}}

</body>
</html>