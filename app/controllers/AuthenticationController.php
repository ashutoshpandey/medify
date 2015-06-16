<?php

class AuthenticationController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            View::share('root', URL::to('/'));
        });
    }
	
	public function userLogin(){
		return View::make('authentication.userlogin');
	}
	
	public function expertLogin(){
		return View::make('authentication.expertlogin');
	}
	
	public function adminlogin(){
		return View::make('authentication.adminlogin');
	}
	
	public function register(){
		return View::make('authentication.register');
	}
	
	public function passwordRecovery(){
		return View::make('authentication.passwordrecovery');
	}
	
	public function passwordSent(){
		return View::make('authentication.passwordsent');
	}

    public function isValidAdmin()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        $admin = Admin::where('username', '=', $username)
                        ->where('password','=',$password)->first();

        if(is_null($admin))
            return "invalid";
        else{
            Session::put('admin_id', $admin->id);

            return "correct";
        }
    }

	public function isValidUser()
	{
        $email = Input::get('email');
        $password = Input::get('password');

        $user = User::where('email', '=', $email)
                    ->where('password','=',$password)->first();

        if(is_null($user)){

            $ar = array("message"=>"invalid");

            return $ar;
        }
        else{
            Session::put('user_id', $user->id);
            Session::put('timezone', $user->timezone);

            $ar = array(
                "message"       =>  "correct",
                "id"            =>  $user->id,
                "first_name"    =>  $user->first_name,
                "last_name"     =>  $user->last_name,
                "email"         =>  $email
            );

            return $ar;
        }
	}

    public function isDuplicateUser($email)
    {
        $user = User::where('email', '=', $email)->first();

        return is_null($user) ? "no" : "yes";
    }

    public function saveUser(){

        $email = Input::get('email');

        if($this->isDuplicateUser($email)==="no"){

            $user = new User;

            $country = Input::get('country');
            $timezone = Input::get('timezone');
            $country = Input::get('country');       // from payment create user
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->country = $country;
            $user->status = "active";
            $user->created_at = date("Y-m-d h:i:s");
            $user->updated_at = date("Y-m-d h:i:s");

            $user->save();

            Session::put('user_id', $user->id);
            Session::put('logged', true);

            $this->sendUserEmail();

            $ar = array(
                "message"   =>  "done",
                "id"        =>  $user->id
            );
        }
        else
            $ar = array(
                "message"   =>  "duplicate"
            );

        return $ar;
    }

    public function expertSaved(){
        Session::put('status','pending');
        return View::make('authentication.expertsaved');
    }

    public function expertRegister(){
        return View::make('authentication.expert-register');
    }

    public function saveExpert(){
        $email = Input::get('email');

        if($this->isDuplicateExpert($email)==="no"){

            $expert = new Expert;

            $expert->email = $email;
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country-sign');
            $expert->timezone = Input::get('timezone-sign');
            $expert->city = Input::get('city');
            $expert->about = "";
            $expert->status = "pending";
            $expert->created_at = date("Y-m-d h:i:s");
            $expert->updated_at = date("Y-m-d h:i:s");

            $expert->save();

            Session::put('name', $expert->name);
            Session::put('expert_id', $expert->id);

            return "done";
        }
        else
            return "duplicate";
    }

    public function isDuplicateExpert($email)
    {
        $expert = Expert::where('email', '=', $email)->first();

        return is_null($expert) ? "no" : "yes";
    }

    public function userSaved(){

        if(is_null(Session::get('name')))
            return View::make('static.index');
        else{
            $id=Session::get('user_id');
            $user=User::find($id);
            return View::make('authentication.usersaved')->with('user_email',$user->email);
        }
    }

    public function sendPassword(){

        $email = Input::get('email');

        $user = User::where('User.email','=',$email)->first();

        $data = array('name'=>$user->name);

        Mail::send('emails.resetpassword', $data, function($message)use ($user){

            $message->to($user->email, $user->name)->subject('You requested your password');
        });
    }
    public function sendUserEmail(){
        ini_set('max_execution_time',3600);
        if(is_null(Session::get('name')))
            return View::make('static.index');
        else{
            $id=Session::get('user_id');
            $user=User::find($id);

            $data = array('name' => $user->email);

            Mail::send('emails.usermail', $data, function($message)use ($user){

                $message->to($user->email, $user->name)->subject('Welcome to zantama.com');
            });
        }
        return View::make('authentication.usersaved')->with('user_email',$user->email);
    }

    public function sendExpertEmail(){

        ini_set('max_execution_time',3600);
        if(is_null(Session::get('expert_id')))
            return View::make('static.index');
        else{
            $id=Session::get('expert_id');
            $expert=Expert::find($id);

            $data = array('name'=>$expert->email);

            Mail::send('emails.expertmail', $data, function($message)use ($expert){

                $message->to($expert->email, $expert->first_name.' '.$expert->last_name)->subject('Welcome to zantama.com');
            });
        }
        return View::make('authentication.expertsaved')->with('expert_email',$expert->email);
    }

    public function sendExpertPassword(){

        $email = Input::get('email');

        $expert = Expert::where('Expert.email','=',$email)->first();

        $data = array('name'=>$expert->name);

        Mail::send('emails.resetpassword', $data, function($message)use ($expert){

            $message->to($expert->email, $expert->name)->subject('You requested your password');
        });
    }

    public function isValidExpert()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $expert = Expert::where('email', '=', $email)->where('password','=', $password)->first();

        if(is_null($expert))
            return "invalid";
        else{
            Session::put('expert_id', $expert->id);
            Session::put('timezone', $expert->timezone);
            Session::put('country', $expert->country);
            return "correct";
        }
    }
    /************************ expert methods ************************/
}