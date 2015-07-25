<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration | View Expert</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('includes.admin.common_css')

    {{HTML::style(asset("/public/css/AdminLTE.css"))}}
    {{HTML::style(asset("/public/css/admin-skins/_all-skins.min.css"))}}

    @include('includes.admin.common_js_top')
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Expert: {{$expert->first_name}} {{$expert->last_name}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class='tab-container'>
                <ul class='tabs'>
                    <li><a href='#tab-edit'>Edit</a></li>
                    <li><a href='#tab-memberships'>Memberships</a></li>
                    <li><a href='#tab-specialties'>Specialties</a></li>
                    <li><a href='#tab-services'>Services</a></li>
                    <li><a href='#tab-achievements'>Achievements</a></li>
                    <li><a href='#tab-social'>Social profiles</a></li>
                    <li><a href='#tab-qualification'>Qualification</a></li>
                </ul>

                <div id='tab-edit'>
                    <div id='form-container'>
                        <form id='form-create-book' action="{{$root}}/update-admin-expert" method="post" target="ifr" enctype="multipart/form-data"
                              onsubmit="startUpdatingExpert()">
                            <div class='form-row'>
                                <div class='form-label'>First Name</div>
                                <div class='form-data'>
                                    <input type='text' name='first_name' value="{{$expert->first_name}}"/>
                                </div>
                                <div class='form-label'>Last Name</div>
                                <div class='form-data'>
                                    <input type='text' name='last_name' value="{{$expert->last_name}}"/>
                                </div>
                                <div class='clear'></div>
                            </div>
                            <div class='form-row'>
                                <div class='form-label'>Password</div>
                                <div class='form-data'>
                                    <input type='text' name='password' value="{{$expert->password}}"/>
                                </div>
                                <div class='form-label'>Confirm Password</div>
                                <div class='form-data'>
                                    <input type='text' name='confirm_password' value="{{$expert->password}}"/>
                                </div>
                                <div class='clear'></div>
                            </div>
                            <div class='form-row'>
                                <div class='form-label'>Email</div>
                                <div class='form-data'>
                                    <input type='text' name='email' value="{{$expert->email}}"/>
                                </div>
                                <div class='form-label'>Contact Number</div>
                                <div class='form-data'>
                                    <input type='text' name='contact_number' value="{{$expert->contact_number}}"/>
                                </div>
                                <div class='clear'></div>
                            </div>
                            <div class='form-row'>
                                <div class='form-label'>Extension Number</div>
                                <div class='form-data'>
                                    <input type='text' name='extension_number' value="{{$expert->extension_number}}"/>
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
                                    <textarea name="about" rows="5">{{$expert->about}}</textarea>
                                </div>
                                <div class='clear'></div>
                            </div>
                            <div class='form-row'>
                                <div class='form-label'>Experience</div>
                                <div class='form-data-full'>
                                    <textarea name="experience" rows="5">{{$expert->experience}}</textarea>
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
                                    <input type='submit' value="Update Expert" class='half'/> <span
                                        class='message'></span>
                                </div>
                                <div class='clear'></div>
                            </div>
                        </form>
                        <iframe id="ifr" name="ifr" style="visibility: hidden; width:1px; height:1px"></iframe>
                    </div>
                </div>

                <div id='tab-memberships'>

                    <form id='form-create-membership'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Details</div>
                            <div class='form-data'>
                                <textarea name='details' rows="4"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-membership' value="Create Membership"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='membership-list' class='list-container'></div>

                </div>

                <div id='tab-specialties'>

                    <form id='form-create-specialty'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Details</div>
                            <div class='form-data'>
                                <textarea name='details' rows="4"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-specialty' value="Create Specialty"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='specialty-list' class='list-container'></div>
                </div>

                <div id='tab-services'>

                    <form id='form-create-service'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Details</div>
                            <div class='form-data'>
                                <textarea name='details' rows="4"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-service' value="Create Service"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='service-list' class='list-container'></div>
                </div>

                <div id='tab-achievements'>

                    <form id='form-create-achievement'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Details</div>
                            <div class='form-data'>
                                <textarea name='details' rows="4"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-achievement' value="Create Achievement"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='achievement-list' class='list-container'></div>
                </div>

                <div id='tab-social'>

                    <form id='form-create-social'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>URL</div>
                            <div class='form-data'>
                                <input type='text' name='url'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-social' value="Create Social"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='social-list' class='list-container'></div>
                </div>

                <div id='tab-qualification'>

                    <form id='form-create-qualification'>
                        <div class='form-row'>
                            <div class='form-label'>Name</div>
                            <div class='form-data'>
                                <input type='text' name='name'/>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>Description</div>
                            <div class='form-data'>
                                <textarea name='description' rows="4"></textarea>
                            </div>
                            <div class='clear'></div>
                        </div>
                        <div class='form-row'>
                            <div class='form-label'>&nbsp;</div>
                            <div class='form-data'>
                                <input type='button' name='btn-create-qualification' value="Create Qualification"/>
                            </div>
                            <div class='clear'></div>
                        </div>
                    </form>

                    <div id='qualification-list' class='list-container'></div>

                </div>
            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@include('includes/common_js_bottom')
{{HTML::script(asset("/public/js/site/admin/view-expert.js"))}}
<span style="display: none" rel='{{$expert->id}}' id='expert_id'>&nbsp;</span>
</body>
</html>
