<?php

namespace App\Controllers;

class Offre extends BaseController
{
    public function index()
    {
        return view('form/BookForm');
    }

    public function offre1()
    {
        return view('Offre/offre1');
    }

    public function offre2()
    {
        return view('Offre/offre2');
    }

    public function offre3()
    {
        return view('Offre/offre3');
    }
}
