<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration | View Appointment</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('includes.admin.common_css')

    {{HTML::style(asset("/public/css/AdminLTE.css"))}}
    {{HTML::style(asset("/public/css/site/admin/view-appointment.css"))}}
    {{HTML::style(asset("/public/css/admin-skins/_all-skins.min.css"))}}

    @include('includes.admin.common_js_top')
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left:0 !important">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Appointment ID: {{$appointment->id}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class='tab-container'>
                <div id='tab-create'>
                    <div id='form-container' style="background-color: white">
                        <form id='form-update-book'>
                            <div class='form-row'>
                                <div class='form-label'>Appointment Type</div>
                                <div class='form-data'>
                                    {{$appointment->appointment_type}}
                                </div>
                                <div class='clear'></div>
                            </div>
                            <div class='form-row'>
                                <div class='form-label'>Date</div>
                                <div class='form-data'>
                                    {{date('d-M-Y', strtotime($appointment->appointment_date))}}
                                </div>
                                <div class='form-label'>Time</div>
                                <div class='form-data'>
                                    {{date('h:i A', strtotime($appointment->appointment_date))}}
                                </div>
                                <div class='clear'></div>
                            </div>

                            <div class="col3_by_4">
                                <div class="divider-header">Customer</div>

                                <div class='form-row'>
                                    <div class='form-label'>Customer ID</div>
                                    <div class='form-data'>
                                        {{$appointment->user_id}}
                                    </div>
                                    <div class='form-label'>Customer Name</div>
                                    <div class='form-data'>
                                        {{$appointment->user->first_name}} {{$appointment->user->last_name}}
                                    </div>
                                    <div class='clear'></div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-label'>Customer Contact</div>
                                    <div class='form-data'>
                                        {{$appointment->user->contact_number}}&nbsp;
                                    </div>
                                    <div class='form-label'>Customer Email</div>
                                    <div class='form-data'>
                                        {{$appointment->user->email}}
                                    </div>
                                    <div class='clear'></div>
                                </div>
                            </div>
                            <div class="col1_by_4">
                                {{HTML::image('public/images/')}}
                            </div>
                            <div class="clear"></div>

                            <div class="col3_by_4">
                                <div class="divider-header">Expert</div>

                                <div class='form-row'>
                                    <div class='form-label'>Expert ID</div>
                                    <div class='form-data'>
                                        {{$appointment->expert_id}}
                                    </div>
                                    <div class='form-label'>Expert Name</div>
                                    <div class='form-data'>
                                        {{$appointment->expert->first_name}} {{$appointment->expert->last_name}}
                                    </div>
                                    <div class='clear'></div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-label'>Expert Contact</div>
                                    <div class='form-data'>
                                        {{$appointment->expert->contact_number}}&nbsp;
                                    </div>
                                    <div class='form-label'>Expert Email</div>
                                    <div class='form-data'>
                                        {{$appointment->expert->email}}
                                    </div>
                                    <div class='clear'></div>
                                </div>
                            </div>
                            <div class="col1_by_4">
                                {{HTML::image('public/images/')}}
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
            </div>

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

@include('includes/common_js_bottom')
{{HTML::script(asset("/public/js/site/admin/view-book.js"))}}
</body>
</html>
