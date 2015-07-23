<!doctype html>
<html lang="en">
<head>
    @include('includes.common_css')

    {{HTML::style(asset("/public/css/site/flexslider.css"))}}

    @include('includes.common_js_top')
</head>
<body>

@include('includes.header')

<div class="detail_banner row">
    {{HTML::image(asset("public/images/detail_banner.jpg"),"", array('class' => 'responsive'))}}

    <div class="overlay">
        <div class="banner_content">
            <div class="container">

                <div class="banner_breif">
                    <div class="profile_pic">
                        {{HTML::image(asset($expertPic),"", array('class' => 'responsive'))}}
                    </div>
                    <p class="expert_name">{{$expertTitle}}. {{$expertName}}</p>

                    <p class="expert_qualification">{{$expert->highest_qualification}}</p>

                    <p class="expert_designation">Heart Surgeon</p>

                    <p class="expert_tags"><span>Physician</span> <span>Heart</span></p>
                    <button>BOOK APPOINTMENT</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="connect_banner row">
    <div class="container">
        <p class="a-left f-left six">Connect <span class="fa fa-facebook-official"></span> <span
                    class="fa fa-twitter-square"></span> <span
                    class="fa fa-linkedin-square"></span>
        </p>

        <p class="f-right a-right six">
            <span class="fa fa-thumbs-up"></span> 21 Recommendations
        </p>
    </div>
</div>
<div class="container">
    <div class="row expert_details">
        <section>
            <p class="heading"><span class="fa fa-user-md"></span> ABOUT</p>

            <p>{{$expert->about}}</p>
        </section>

        <section>
            <!--<p class="heading"><span class="fa fa-map-marker"></span> AVAILABLE LOCATIONS</p>-->
            <div class="expert_locations">
                <div class="rating">
                    <div class="pie_progress punctuality" role="progressbar" data-goal="33">
                        <div class="pie_progress__number">0%</div>
                    </div>
                    <p>Punctuality</p>
                </div>
                <div class="rating">
                    <div class="pie_progress behavior" role="progressbar" data-goal="33">
                        <div class="pie_progress__number">0%</div>
                    </div>
                    <p>Behavior</p>
                </div>
                <div class="rating">
                    <div class="pie_progress satisfaction" role="progressbar" data-goal="33">
                        <div class="pie_progress__number">0%</div>
                    </div>
                    <p>Satisfaction</p>
                </div>
            </div>
        </section>
        <div class="row">
            <section class="column six">
                <p class="heading"><span class="fa fa-map-marker"></span> QUALIFICATIONS</p>

                @if(isset($expert->qualifications))

                    <ul>
                        @foreach ($expert->qualifications as $qualification)
                            <li>{{$qualification->name}}</li>
                        @endforeach

                    </ul>

                @else
                    -
                @endif

            </section>

            <section class="column six">
                <p class="heading"><span class="fa fa-map-marker"></span> AWARDS</p>

                @if(isset($expert->achievements))

                    <ul>
                        @foreach ($expert->achievements as $achievement)
                            <li>{{$achievement->name}}</li>
                        @endforeach

                    </ul>

                @else
                    -
                @endif

            </section>
        </div>
        <div class="row">
            <section class="column six">
                <p class="heading"><span class="fa fa-map-marker"></span> SPECIALIZATION</p>

                @if(isset($expert->specialties))

                <ul>
                    @foreach ($expert->specialties as $specialty)
                        <li>{{$specialty->name}}</li>
                    @endforeach

                </ul>

                @else
                    -
                @endif

            </section>

            <section class="column six">
                <p class="heading"><span class="fa fa-map-marker"></span> MEMBERSHIPS</p>

                @if(isset($expert->memberships))

                    <ul>
                        @foreach ($expert->memberships as $membership)
                            <li>{{$membership->name}}</li>
                        @endforeach

                    </ul>

                @else
                    -
                @endif

            </section>
        </div>

        <section>
            <p class="heading"><span class="fa fa-map-marker"></span> SERVICES</p>

            @if(isset($expert->services))

                <?php $i=0; $divOpen=false; ?>

                @foreach ($expert->services as $service)
                    @if($i%4==0)
                        <?php $divOpen = true; ?>

                        <div class="column four">
                            <ul>
                    @endif
                    <?php $i++; ?>

                            <li>{{$service->name}}</li>

                    @if($i%4==0)
                            </ul>
                        </div>
                    @endif

                @endforeach

                @if($divOpen)
                        </ul>
                    </div>
                @endif
            @else
                -
            @endif

        </section>
        <div class="clear"></div>
        <section>

            <p class="heading"><span class="fa fa-map-marker"></span> CASE STUDY</p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia enim magna, non aliquet turpis
                scelerisque sed. Sed vel augue vitae mauris
                venenatis faucibus. Donec sit amet ullamcorper justo, eufaucibus magna. Sed id purus sit amet orci
                rutrum semper. Duis dignissim enim eget sem
                vulputate, id suscipit libero ullamcorper. Integer et interdum dui. Nullam tempus in nisl a mattis.Lorem
                ipsum dolor sit amet, consectetur adipiscing
                elit. Nullam lacinia enim magna, non aliquet turpis scelerisque sed. Sed vel augue vitae mauris
                venenatis faucibus. Donec sit amet ullamcorper justo,
                eufaucibus magna. Sed id purus sit amet orci rutrum semper. Duis dignissim enim eget sem vulputate, id
                suscipit libero ullamcorper. Integer et
                interdum dui. Nullam tempus in nisl a mattis.</p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia enim magna, non aliquet turpis
                scelerisque sed. Sed vel augue vitae mauris
                venenatis faucibus. Donec sit amet ullamcorper justo, eufaucibus magna. Sed id purus sit amet orci
                rutrum semper. Duis dignissim enim eget sem
                vulputate, id suscipit libero ullamcorper. Integer et interdum dui. Nullam tempus in nisl a mattis.</p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia enim magna, non aliquet turpis
                scelerisque sed. Sed vel augue vitae mauris
                venenatis faucibus. Donec sit amet ullamcorper justo, eufaucibus magna. Sed id purus sit amet orci
                rutrum semper. Duis dignissim enim eget sem
                vulputate, id suscipit libero ullamcorper. Integer et interdum dui. Nullam tempus in nisl a mattis.
            </p>

        </section>


    </div>
</div>
</div>

{{HTML::script(asset("/public/js/jquery.flexslider-min.js"))}}
{{HTML::script(asset("/public/js/jquery-asPieProgress.min.js"))}}
{{HTML::script(asset("/public/js/site/detail_circ.js"))}}
<script type="text/javascript">
    $(window).on('load', function () {
        $('.pie_progress.punctuality').asPieProgress('go', '50%');
        $('.pie_progress.behavior').asPieProgress('go', '80%');
        $('.pie_progress.satisfaction').asPieProgress('go', '70%');
    });
</script>

@include('includes.footer')

</body>
</html>

