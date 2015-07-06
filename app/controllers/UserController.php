<?php

class UserController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
        View::share('name', Session::get('name'));
    }

    function dashboard(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return Redirect::to('/');

        return View::make('users.user-section');
    }

    function editUser(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return Redirect::to('/');

        $user = user::find($userId);

        if(isset($user))
            return View::make('users.edit')->with('user', $user);
        else
            return Redirect::to('/');
    }

    function updateUser(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return 'not logged';

        $user = user::find($userId);

        if(isset($user)){

            $email = Input::get('email');

            $userByEmail = user::where('email', '=', $email)->first();

            if(isset($userByEmail) && $userByEmail->id != $user->id)
                echo 'duplicate';
            else{
                $user->id = $userId;
                $user->email = $email;
                $user->name = Input::get('name');
                $user->password = Input::get('password');
                $user->user_type = Input::get('user_type');

                $user->save();

                echo 'done';
            }
        }
        else
            echo 'invalid';
    }

    function updatePassword(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return 'not logged';

        $user = user::find($userId);

        if(isset($user)){

            $user->password = Input::get('password');

            $user->save();

            echo 'done';
        }
        else
            echo 'invalid';
    }

    function updatePicture(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return 'not logged';

        $user = user::find($userId);

        if(isset($user)){

            if (Input::hasFile('image')){

                $file = array('image' => Input::file('image'));

                $rules = array('image' => 'required|max:10000|mimes:png,jpg,jpeg,bmp,gif');
                $validator = Validator::make($file, $rules);
                if ($validator->fails()) {
                    echo 'wrong';
                }
                else {
                    $imageNameSaved = date('Ymdhis');

                    $imageName = Input::file('image')->getClientOriginalName();
                    $extension = Input::file('image')->getClientOriginalExtension();

                    $fileName = $imageNameSaved . '.' . $extension;
                    $destinationPath = "user-images/";

                    Input::file('image')->move($destinationPath, $fileName);

                    $user->image_name = $imageName;
                    $user->image_name_saved = $fileName;

                    $user->save();

                    echo 'done';
                }
            }
            else
                echo 'wrong';
        }
        else
            echo 'invalid';
    }

    function uploadDocument(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return 'not logged';

        $user = user::find($userId);

        if(isset($user)){

            if (Input::hasFile('documents')){

                $files = Input::file('documents');

                $rules = array('image' => 'required|max:10000|mimes:png,jpg,jpeg,bmp,gif,pdf,doc,docx,xls,csv');

                foreach($files as $file) {

                    $validator = Validator::make($file, $rules);
                    if ($validator->fails()) {
                        echo 'wrong';
                    }
                    else {
                        $documentNameSaved = date('Ymdhis');

                        $documentName = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();

                        $fileName = $documentNameSaved . '.' . $extension;
                        $destinationPath = "user-documents/$userId/";

                        $file->move($destinationPath, $fileName);

                        $userDocument = new UserDocument();

                        $userDocument->document_name = $documentName;
                        $userDocument->document_name_saved = $fileName;

                        $userDocument->save();

                        echo 'done';
                    }
                }
            }
            else
                echo 'wrong';
        }
        else
            echo 'invalid';
    }

    function removeDocument($id){

        $userId = Session::get('userId');

        if(!isset($userId)){
            echo 'not logged';
            return;
        }

        if(isset($id)) {
            $userDocument = UserDocument::find($id);

            if(isset($userDocument)){
                $userDocument->status = 'removed';
                $userDocument->save();
            }
        }
        else
            echo 'invalid';
    }

    function removeAccount(){

        $userId = Session::get('userId');

        if(!isset($userId)){
            echo 'not logged';
            return;
        }

        if(isset($userId)) {

            $user = user::find($userId);

            if(isset($user)){
                $user->status = 'removed';

                $user->save();

                echo 'done';
            }
            else
                echo 'invalid';
        }
        else
            echo 'invalid';
    }

    function userAppointments(){

        $userId = Session::get('userId');

        if(!isset($userId))
            return Redirect::to('/');

        return View::make('user.appointments');
    }

    function cancelAppointment($id){

        $userId = Session::get('userId');

        if(!isset($userId)){
            echo 'not logged';
            return;
        }

        $appointment = Appointment::find($id);

        if(isset($appointment)){
            $appointment->status = 'user-cancelled';
            $appointment->cancel_date = date('Y-m-d h:i:s');
            $appointment->save();

            echo 'done';
        }
        else
            echo 'invalid';
    }

    function bookAppointment($id){

        $userId = Session::get('userId');

        if(!isset($userId)){
            echo 'not logged';
            return;
        }

        $appointment = Appointment::find($id);

        if(isset($appointment)){
            $appointment->status = 'cancelled';
            $appointment->booked_by = Session::get('userId');
            $appointment->booking_date = date('Y-m-d h:i:s');
            $appointment->save();

            echo 'done';
        }
        else
            echo 'invalid';
    }

    /************** json methods ***************/

    function dataGetUser($id){

        $user = User::find($id);

        return $user;
    }

    function dataUserAppointments($id, $startDate=null, $endDate=null){

        if(isset($id)){

            if(isset($startDate) && isset($endDate)){

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $appointments = Appointment::where('user_id', '=', $id)
                                           ->where('start_date', '>=', $startDate)
                                           ->where('end_date', '<=', $endDate)->get();
            }
            else if(isset($startDate)){

                $startDate = date('Y-m-d', strtotime($startDate));

                $appointments = Appointment::where('user_id', '=', $id)
                    ->where('start_date', '>=', $startDate)->get();
            }
            else
                $appointments = Appointment::where('user_id', '=', $id)->get();

            if(isset($appointments))
                return json_encode(array('message'=>'found', 'appointments' => $appointments->toArray()));
            else
                return json_encode(array('message'=>'empty'));
        }
        else
            return json_encode(array('message'=>'invalid'));
    }

    function dataUserAppointmentsByType($id, $appointmentType, $startDate=null, $endDate=null){

        if(isset($id) && isset($appointmentType)){

            if(isset($startDate) && isset($endDate)){

                $startDate = date('Y-m-d', strtotime($startDate));
                $endDate = date('Y-m-d', strtotime($endDate));

                $appointments = Appointment::where('user_id', '=', $id)
                    ->where('appointment_type', '>=', $appointmentType)
                    ->where('start_date', '>=', $startDate)
                    ->where('end_date', '<=', $endDate)->get();
            }
            else if(isset($startDate)){

                $startDate = date('Y-m-d', strtotime($startDate));

                $appointments = Appointment::where('user_id', '=', $id)
                    ->where('appointment_type', '>=', $appointmentType)
                    ->where('start_date', '>=', $startDate)->get();
            }
            else
                $appointments = Appointment::where('user_id', '=', $id)
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

        $id = Session::get('user_id');

        $appointments = Appointment::where('user_id','=',$id)->
            where('status','=','cancelled')->get();

        return $appointments;
    }
}