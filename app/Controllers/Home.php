<?php namespace App\Controllers;
use App\Models\Session;

class Home extends BaseController
{
	public function index()
        {
        $iduser = NULL;

        if (Session::verifySession()) {
            $iduser = Session::getSessionData('idUser');
        }
                echo view('template/header',['iduser' => $iduser]);
		echo view('welcome_message');
	}

        public function confirmation()
        {
                echo view('Offre/confirmation');
        }

	//--------------------------------------------------------------------

}

