<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FormController extends Controller
{
    public function BookForm()
    {
        echo view('template/header');
        echo view('form/BookForm'); // Charge la vue BookForm.php
         
    }
}

