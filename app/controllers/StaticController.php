<?php

class StaticController extends BaseController {
	public function __construct(){

		$this->beforeFilter(function(){
			View::share('root', URL::to('/'));
		});
	}

	public function home()
	{
		return View::make('home');
	}

}