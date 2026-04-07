<?php namespace App\Controllers;
use App\Models\Session;

class Home extends BaseController
{
	public function index()
        {
		echo view('welcome_message');
	}

        public function confirmation()
        {
                echo view('Offre/confirmation');
        }

	//--------------------------------------------------------------------

}

