<?php

class StaticController extends BaseController {

	public function __construct(){

		$this->beforeFilter(function(){
			View::share('root', URL::to('/'));
			View::share('public_path', public_path());
		});
	}

	public function home()
	{
		return View::make('home');
	}

	public function expertLogin(){
		return View::make('expert-login');
	}

	public function experts($city=null, $keyword=null){
		return View::make('expert.experts');
	}

	public function expert($id){

		if(isset($id)){

			$expert = Expert::find($id)->with('specialties')->with('memberships')->with('qualifications')->with('achievements')->with('services')->with('socials')->first();

			if(isset($expert)){

				if(isset($expert->image_name)){
					$expertPic = asset('public/uploads/experts/' . $expert->id . '/' . $expert->image_name);
					$fileLocation = public_path() . '\\uploads\\experts\\' . $expert->id . '\\' . $expert->image_name;

					if(!file_exists($fileLocation))
						$expertPic = asset('public/images/expert.jpg');
				}
				else
					$expertPic = asset('public/images/expert.jpg');

				$expertTitle = 'Mr';
				if(strtolower($expert->gender)=='female')
					$expertTitle = 'Ms';

				$expertName = $expert->first_name . ' ' . $expert->last_name;

				return View::make('expert.detail')
								->with('expert', $expert)
								->with('expertPic', $expertPic)
								->with('expertTitle', $expertTitle)
								->with('expertName', $expertName);
			}
			else
				return Redirect::to('/');
		}
		else
			return Redirect::to('/');
	}
}