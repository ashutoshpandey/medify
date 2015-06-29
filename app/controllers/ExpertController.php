<?php

class ExpertController extends BaseController {

    public function __construct(){

        $this->beforeFilter(function(){
            $id = Session::get('expert_id');

            date_default_timezone_set("UTC");

            View::share('root', URL::to('/'));
        });
    }

    public function dashboard(){

        $id = Session::get('expert_id');

        if(!isset($userId))
            return Redirect::to('/');

        $expert = Expert::find($id);

        $appointment_count = Appointment::where('expert_id', '=', $id)
                                        ->where('status','=','booked')
                                        ->where('appointment_date','>=', date('Y-m-d H:i:s'))->count();

        $availability_count = Appointment::where('expert_id', '=', $id)
            ->where('status','=','pending')
            ->where('appointment_date','>=', date('Y-m-d H:i:s'))->count();

        return View::make('expert.dashboard')
                    ->with('appointment_count', $appointment_count)
                    ->with('availability_count', $availability_count)
                    ->with('expert_name', $expert->first_name . " " . $expert->last_name);
    }

    public function appointments(){

        return View::make('expert.availabilities');
    }

    public function appointment($id){

        $appointment = Appointment::find($id);

        $appointment->appointment_date=$this->toLocalDate($appointment->appointment_date,$appointment->expert_id);

        return View::make('expert.appointment')->with("appointment",$appointment);
    }

    public function history(){

        $currentDate = date("Y-m-d H:i:s");

        $id = Session::get('expert_id');

        $appointments = Appointment::where('expert_id','=',$id)
                                    ->where(function($q) use($currentDate){
                                        $q->where('status','=','user-cancelled')
                                            ->orWhere('status','=','expert-cancelled')
                                            ->orWhere('appointment_date','<',$currentDate);
                                    })->get();

        return View::make('expert.history')->with('appointments', $appointments);
    }

    public function cancelAvailableAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            if($appointment->status==="pending"){

                $appointment->delete();

                return "done";
            }
            else
                return "booked";
        }
    }

    public function setAvailabilities(){
        return View::make('expert.set-availability');
    }

    public function saveAvailabilities(){

        $expert_id = Session::get('expert_id');

        $availabilities = Input::get('availability');

        if(is_null($availabilities) || count($availabilities)==0)
            return "invalid";
        else{

            $start_time = $availabilities[0];
            $start = date("Y-m-d H:i:s", strtotime($start_time));

            $end_time = $availabilities[count($availabilities)-1];
            $end = date("Y-m-d H:i:s", strtotime($end_time));

            DB::table('appointments')->where('expert_id', '=', $expert_id)
                              ->where('status', '=', 'pending')
                              ->where('appointment_date', '>=', $start)
                              ->where('appointment_date', '<=', $end)->delete();

            for($i=0; $i<count($availabilities); $i++){

                $appointment = new Appointment();

                $dt=date("Y-m-d H:i:s",strtotime($availabilities[$i]));
                $utc_date = $this->toUTCDate($dt, $expert_id);

                if($utc_date==null)
                    return "error";

                $appointment->appointment_date = $utc_date;
                $appointment->created_at = date("Y-m-d H:i:s");
                $appointment->updated_at = date("Y-m-d H:i:s");
                $appointment->status = "pending";
                $appointment->expert_id = $expert_id;

                $appointment->save();
            }

            return "done";
        }
    }

    public function getAvailabilities(){

        $expert_id = Session::get('expert_id');

        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');

        $start_date = date("Y-m-d", strtotime($start_date));
        $end_date = date("Y-m-d", strtotime($end_date));

        $startDate = $start_date . " 00:00:01";
        $endDate = $end_date . " 23:59:59";

        $appointments = Appointment::where('status','=','pending')
                                   ->where('expert_id','=',$expert_id)
                                   ->where('appointment_date','>',$startDate)
                                   ->where('appointment_date','<',$endDate)->orderBy('appointment_date', 'ASC')->get();

        foreach($appointments as $appointment)
            $appointment->appointment_date=$this->toLocalDate($appointment->appointment_date,$expert_id);

        return $appointments;
    }

    public function edit(){

        $id = Session::get('expert_id');
        $status = Session::get('status');
        $categories = Category::all();

        $expert = Expert::find($id);

        return View::make('expert.profile')->with("expert", $expert)->with('categories', $categories)->with('status',$status);
    }

    public function updateProfile(){

		$id = Session::get('expert_id');

        $expert = Expert::find($id);

        if(is_null($expert))
            return "invalid";
        else{

            if (Input::hasFile('file') && Input::file('file')->isValid())
            {
                $pic = Input::file('file')->getClientOriginalName();
                $destinationPath = public_path() . "/img/experts/";

                Input::file('file')->move($destinationPath, $pic);

                list($width, $height) = getimagesize($destinationPath.$pic);

                if($height>500){
                    $height=100;
                    $width=100;
                }
            }
            else if(Input::get('remove_pic'))
                $expert->pic="";
            else
                $pic=$expert->pic;

            $expert->category_id = Input::get('category_id');

            $expert->email = Input::get('email');
            $expert->password = Input::get('password');
            $expert->first_name = Input::get('first_name');
            $expert->last_name = Input::get('last_name');
            $expert->country = Input::get('country');
            $expert->timezone = Input::get('timezone');
            $expert->session_type = Input::get('session_type');
            $expert->pic = $pic;
            $expert->fees_rupee = Input::get('fees-rupee');
            $expert->fees_dollar = Input::get('fees-dollar');
            $expert->about = Input::get('about');
            $expert->status = "active";
            $expert->updated_at = date("Y-m-d H:i:s");

            $expert->save();

            Session::put('status','updated');

            $categories = Input::get('chksubcategory');

            if($categories && count($categories)>0){

                DB::statement("delete FROM expert_categories WHERE expert_id=$id and category_id=" . $expert->category_id);

                foreach($categories as $subcategory_id){

                    $expert_category = new ExpertCategory();

                    $expert_category->expert_id = $id;
                    $expert_category->category_id = $expert->category_id;
                    $expert_category->subcategory_id = $subcategory_id;
                    $expert_category->status = 'active';

                    $expert_category->save();
                }
            }

            return "done";
        }
    }

    public function videoChat($id){

        $expert_id = Session::get('expert_id');

        $appointment = Appointment::find($id);

        if($expert_id===$appointment->expert_id){

            $time1 = strtotime(date("Y-m-d H:i:s"));
            $time2 = strtotime($appointment->appointment_date);
            $tm = ($time1 - $time2) / 60;

            if($tm>0){

                return Redirect::to('/video-chat')->with("appointment_id", $appointment->id)->with('start',true)->with('usertype','expert');
            }
            else{
                return Redirect::to('/video-chat')->with("start", false);
            }
        }
        else{
            return Redirect::to('static/videochat')->with("start", false);
        }
    }

    public function user($id){

        $appointment = Appointment::find($id);

        $user = User::find($appointment->user_id);

        return View::make('expert.user')->with("user", $user);
    }

    public function expertLogout(){

        Session::flush();

        Auth::logout();

        return Redirect::to('index');
    }
	
    public function subCategories($id){

        $subCategories = SubCategory::where('category_id', '=', $id)
                                    ->where('status','=','active')->get();

        return $subCategories;
    }

/******************** time zone methods ************************************/
    public static function toUTCDate($dt, $expert_id){

        $expert = Expert::find($expert_id);

        $country = $expert->country;

        $timezone = Timezone::where('country','=',$country)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time_original = strtotime($dt);

            $time = $time_original - $offset*3600;

            return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toLocalDate($dt, $expert_id){

        $expert = Expert::find($expert_id);

        $timezone = Timezone::where('country','=',$expert->country)->where('name','=',$expert->timezone)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            $time = $time + $offset*3600;

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toUTCDateByTimezone($dt, $timezone){

        $timezone = Timezone::where('name','=',$timezone)->first();

        if($timezone){
            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            if($offset>0)
                $time = $time - $offset*3600;
            else
                $time = $time + $offset*3600;

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public static function toLocalDateByTimezone($dt, $v_timezone){

        if($v_timezone==="UTC")
            return $dt;

        $timezone = Timezone::where('name','=',$v_timezone)->first();

        if($timezone){

            $offset = floatval($timezone->gmt);

            $time = strtotime($dt);

            $time = $time + $offset*3600;           // $offset could be +ve or -ve

            if($offset>0)
                return date("Y-m-d H:i:s", $time);
            else
                return date("Y-m-d H:i:s", $time);
        }
        else
            return null;
    }

    public function timeZone($country){

        $timezones = Timezone::where('country','=',$country)->get();

        return $timezones;
    }

    public function selectedCategories(){
        $expert_id = Session::get('expert_id');

        $expertCategories = ExpertCategory::where('expert_id', '=', $expert_id)->get();

        $categoryData = array();

        if($expertCategories && count($expertCategories)>0){

            foreach($expertCategories as $expertCategory){

                $category_id = $expertCategory->category->id;
                $category_name = $expertCategory->category->name;
                $subcategory_id = $expertCategory->subcategory->id;
                $subcategory_name = $expertCategory->subcategory->name;

                $categoryData[] = array(
                    'category_id' => $category_id,
                    'category_name' => $category_name,
                    'subcategory_id' => $subcategory_id,
                    'subcategory_name' => $subcategory_name
                );
            }
        }

        return $categoryData;
    }
    /************** json methods ***************/

    public function dataCancelAppointment($id){

        $appointment = Appointment::find($id);

        if(is_null($appointment))
            return "invalid";
        else{
            $appointment->status = "expert-cancelled";
            $appointment->updated_at = date('Y-m-d H:i:s');

            $appointment->save();

            return "done";
        }
    }

    function dataGetExpert($id){

        $expert = Expert::find($id);

        return $expert;
    }

    function dataExpertAppointments($id, $startDate=null, $endDate=null){

        if(isset($id)){

            if(isset($startDate) && isset($endDate)){

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $appointments = Appointment::where('expert_id', '=', $id)
                    ->where('start_date', '>=', $startDate)
                    ->where('end_date', '<=', $endDate)->get();
            }
            else if(isset($startDate)){

                $startDate = date('Y-m-d', strtotime($startDate));

                $appointments = Appointment::where('expert_id', '=', $id)
                    ->where('start_date', '>=', $startDate)->get();
            }
            else
                $appointments = Appointment::where('expert_id', '=', $id)->get();

            if(isset($appointments))
                return json_encode(array('message'=>'found', 'appointments' => $appointments->toArray()));
            else
                return json_encode(array('message'=>'empty'));
        }
        else
            return json_encode(array('message'=>'invalid'));
    }

    function dataExpertAppointmentsByType($id, $appointmentType, $startDate=null, $endDate=null){

        if(isset($id) && isset($appointmentType)){

            if(isset($startDate) && isset($endDate)){

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $appointments = Appointment::where('expert_id', '=', $id)
                    ->where('appointment_type', '>=', $appointmentType)
                    ->where('start_date', '>=', $startDate)
                    ->where('end_date', '<=', $endDate)->get();
            }
            else if(isset($startDate)){

                $startDate = date('Y-m-d', strtotime($startDate));

                $appointments = Appointment::where('expert_id', '=', $id)
                    ->where('appointment_type', '>=', $appointmentType)
                    ->where('start_date', '>=', $startDate)->get();
            }
            else
                $appointments = Appointment::where('expert_id', '=', $id)
                    ->where('appointment_type', '>=', $appointmentType);

            if(isset($appointments))
                return json_encode(array('message'=>'found', 'appointments' => $appointments->toArray()));
            else
                return json_encode(array('message'=>'empty'));
        }
        else
            return json_encode(array('message'=>'invalid'));
    }

    public function dataCancelledAppointments(){

        $id = Session::get('expert_id');

        $appointments = Appointment::where('expert_id','=',$id)->
            where('status','=','cancelled')->get();

        return $appointments;
    }
}