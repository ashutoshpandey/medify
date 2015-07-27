<div class="login_box">
    <span class="close_hiw">
        <svg width="45px" height="45px"><use xlink:href="#close"></use> </svg>
    </span>
    <h2>Sign In</h2>

        <div id='form-container' class="process">

            <form id='form-login'>
                <div class='form-row'>
                    <div class='form-label'>&nbsp;</div>
                    <div class='form-data user_type'>
                        <label><input type="radio" value="expert" name="user_type" checked="checked"/> I am an Expert</label> &nbsp;&nbsp; <label><input type="radio" value="user" name="user_type"/> I am a User</label>
                    </div>
                    <div class='clear'></div>
                </div>

                <div class='form-row'>
                    <div class='form-label'>Email</div>
                    <div class='form-data'>
                        <input type='email' name='email'/>
                    </div>
                    <div class='clear'></div>
                </div>
                <div class='form-row'>
                    <div class='form-label'>Password</div>
                    <div class='form-data'>
                        <input type='password' name='password'/>
                    </div>
                    <div class='clear'></div>
                </div>
                <div class='form-row'>
                    <div class='form-label'>&nbsp;</div>
                    <div class='form-data left-align'>
                        <div id='btn-login' class="btn-box">Login</div> <span class='message'></span>
                        <br/><br/>
                        <a href="javascript:void(0);" rel="sign_up_box" class="box-link">I am a new user</a>
                        <br/><br/>
                        <a href="javascript:void(0);" rel="forgot_password_box" class="box-link">I forgot my password</a>
                    </div>
                    <div class='clear'></div>
                </div>
            </form>
        </div>
</div>

<div class="sign_up_box">
    <span class="close_hiw">
        <svg width="45px" height="45px"><use xlink:href="#close"></use> </svg>
    </span>
    <h2>Sign Up</h2>

    <div id='form-container' class="process">

        <form id='form-sign-up'>

            <div class='form-row'>
                <div class='form-label'>&nbsp;</div>
                <div class='form-data user_type'>
                    <label><input type="radio" value="expert" name="user_type" checked="checked"/> I am an Expert</label> &nbsp;&nbsp; <label><input type="radio" value="user" name="user_type"/> I am a User</label>
                </div>
                <div class='clear'></div>
            </div>

            <div class='form-row'>
                <div class='form-label'>Email</div>
                <div class='form-data'>
                    <input type='email' name='email'/>
                </div>
                <div class='clear'></div>
            </div>
            <div class='form-row'>
                <div class='form-label'>Password</div>
                <div class='form-data'>
                    <input type='password' name='password'/>
                </div>
                <div class='clear'></div>
            </div>
            <div class='form-row'>
                <div class='form-label'>&nbsp;</div>
                <div class='form-data left-align'>
                    <div id='btn-sign-up' class="btn-box">Register</div> <span class='message'></span>
                    <br/><br/>
                    <a href="javascript:void(0);" rel="login_box" class="box-link">Login here</a>
                </div>
                <div class='clear'></div>
            </div>
        </form>
    </div>
</div>

<div class="forgot_password_box">
    <span class="close_hiw">
        <svg width="45px" height="45px"><use xlink:href="#close"></use> </svg>
    </span>
    <h2>Forgot password</h2>

    <div id='form-container' class="process">

        <form id='form-forgot-password'>

            <div class='form-row'>
                <div class='form-label'>&nbsp;</div>
                <div class='form-data left-align'>
                    <h3>Enter your email and we will send a link to reset your password</h3>
                </div>
                <div class='clear'></div>
            </div>

            <div class='form-row'>
                <div class='form-label'>Email</div>
                <div class='form-data'>
                    <input type='email' name='email'/>
                </div>
                <div class='clear'></div>
            </div>

            <div class='form-row'>
                <div class='form-label'>&nbsp;</div>
                <div class='form-data left-align'>
                    <div id='btn-sign-up' class="btn-box">Recover</div> <span class='message'></span>
                    <br/><br/>
                    <a href="javascript:void(0);" rel="login_box" class="box-link">Login here</a>
                </div>
                <div class='clear'></div>
            </div>
        </form>
    </div>
</div>
