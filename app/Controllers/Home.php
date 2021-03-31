<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		// SETTING MANUAL TANGGAL
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		return view('Home/index');
	}
}
