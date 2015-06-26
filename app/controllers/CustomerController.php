<?php

class CustomerController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
        View::share('name', Session::get('name'));
    }

    function customerSection(){

        $customerId = Session::get('customerId');
        if(!isset($customerId))
            return Redirect::to('/');

        return View::make('customers.customer-section');
    }

    function profile(){

        $customerId = Session::get('customerId');
        if(!isset($customerId))
            return Redirect::to('/');

        $customerId = Session::get('customerId');

        if(isset($customerId)){
            $customer = customer::find($customerId);

            if(isset($customer)){

                return View::make('customers.profile')->with('customer', $customer);
            }
            else
                return Redirect::to('/');
        }
        else
            return Redirect::to('/');
    }

    function updateProfile(){

        $customerId = Session::get('customerId');
        if(!isset($customerId))
            return 'not logged';

        $customerId = Session::get('customerId');

        $customer = customer::find($customerId);

        if(isset($customer)){

            $email = Input::get('email');

            $customerByEmail = customer::where('email', '=', $email)->first();

            if(isset($customerByEmail) && $customerByEmail->id != $customer->id)
                echo 'Email already taken';
            else{
                $customer->id = $customerId;
                $customer->email = $email;
                $customer->name = Input::get('name');
                $customer->password = Input::get('password');
                $customer->customer_type = Input::get('customer_type');

                $customer->save();

                echo 'Profile updated successfully';
            }
        }
        else
            echo 'Invalid customer';
    }

    function removeAccount(){

        $customerId = Session::get('customerId');

        if(!isset($customerId)){
            echo 'not logged';
            return;
        }

        if(isset($customerId)) {

            $customer = customer::find($customerId);

            if(isset($customer)){
                $customer->status = 'removed';

                $customer->save();

                echo 'done';
            }
            else
                echo 'invalid';
        }
        else
            echo 'invalid';
    }

    /************** json methods ***************/

}