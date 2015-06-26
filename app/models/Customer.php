<?php

class Customer extends Eloquent{

	protected $table = 'customers';

	protected $hidden = array('password');
}