<?php

class StaticController extends BaseController {

	public function home()
	{
		return View::make('home');
	}

}