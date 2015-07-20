<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration | Books</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('includes.admin.common_css')

    {{HTML::style(asset("/public/css/AdminLTE.css"))}}
    {{HTML::style(asset("/public/css/admin-skins/_all-skins.min.css"))}}

    @include('includes.admin.common_js_top')
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    @include('includes.admin.header')

    @include('includes.admin.menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Experts
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class='tab-container'>
            <ul class='tabs'>
                <li><a href='#tab-list'>List</a></li>
                <li><a href='#tab-create'>Create</a></li>
            </ul>
            <div id='tab-list'>
                <div id='expert-list' class='list-container'></div>
            </div>
            <div id='tab-create'>
                <div id='form-container'>
                    <form id='form-create-book' action="{{$root}}/save-admin-expert" method="post" target="ifr" onsubmit="return startCreatingExpert()">
                        <div class='form-row'>
                            <div class='form-label'>First Name</div>
                            <div class='form-data'>
                                <input type='text' name='first_name'/>
                            </div>
                            <div class='form-label'>Last Name</div>
                            <div class='form-data'>
                                <input type='text' name='last_name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Password</div>
                            <div class='form-data'>
                                <input type='text' name='password'/>
                            </div>
                            <div class='form-label'>Confirm Password</div>
                            <div class='form-data'>
                                <input type='text' name='confirm_password'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Email</div>
                            <div class='form-data'>
                                <input type='text' name='email'/>
                            </div>
                            <div class='form-label'>Contact Number</div>
                            <div class='form-data'>
                                <input type='text' name='contact_number'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Extension Number</div>
                            <div class='form-data'>
                                <input type='text' name='contact_number'/>
                            </div>
                            <div class='form-label'>Gender</div>
                            <div class='form-data'>
                                <select name='gender'>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>About</div>
                            <div class='form-data-full'>
                                <textarea name="about" rows="5"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Experience</div>
                            <div class='form-data-full'>
                                <textarea name="experience" rows="5"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Image</div>
                            <div class='form-data-full'>
                                <input type="file" name="image"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Banner image</div>
                            <div class='form-data-full'>
                                <input type="file" name="banner_image"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data-full'>
                                <input type='submit' value="Create Expert" class='half'/> <span class='message'></span>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>
                    <iframe id="ifr" name="ifr" style="visibility: hidden; width:1px; height:1px"></iframe>
                </div>
            </div>
        </div>

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->
@include('includes/common_js_bottom')
{{HTML::script(asset("/public/js/site/admin/experts.js"))}}
</body>
</html>
