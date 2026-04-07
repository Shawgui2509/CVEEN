<?php

namespace App\Controllers;

class TestController extends BaseController
{
    
    public function index()
    {
        if (!session()->has('id_user')) {
            return redirect()->to(site_url('Connexion'));
        }
    
        return view('PageVitrine/noface1');  
      
    }
    
 
    }
    
    
    
    

