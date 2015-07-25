<header>
    <div class="logo">
        <a href="{{$root}}/">{{HTML::image(asset("public/images/logo.png"))}}</a>
    </div>
    <div class="nav_menu">
        <ul>
            <li><a href="javascript:void(0);" rel="how_it_works">How it works?</a></li>
            <li><a href="javascript:void(0);" rel="login_box">Login</a></li>
        </ul>
    </div>
</header>

<div class="body_compensator"></div>

@include('includes.how-it-works')

@include('includes.login-box')
