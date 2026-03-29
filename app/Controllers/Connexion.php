<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Connexion extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        $session = session(); // Initialisation de la session

        // Vérification si l'utilisateur est déjà connecté
        if ($session->has('id_user')) {
            return redirect()->to(site_url('PageUser'));
        }

        // Vérification si le formulaire est soumis
        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email'    => 'required|valid_email|min_length[4]|max_length[50]',
                'password' => 'required|min_length[4]|max_length[30]',
            ]);

            if (!$validation) {
                return view('template/header')
                    . view('form/login', ['validation' => $this->validator]);
            }

            // Vérification des identifiants
            if ($this->verifyLoginPassword()) {
                return redirect()->to(site_url('PageUser')); // Redirection en cas de succès
            } else {
                return view('template/header')
                    . view('form/login', ['validation' => 'Email ou mot de passe incorrect.']);
            }
        }

        return view('template/header') . view('form/login');
    }

    public function login()
    {
        return $this->index();
    }

    /**
     * Vérifie les identifiants de connexion
     */
    private function verifyLoginPassword(): bool
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first(); // Vérifie si l'utilisateur existe

        if (!$user || !password_verify($password, $user['password'])) {
            return false; // Identifiants incorrects
        }

        // Stockage des informations de l'utilisateur en session
        $session->set([
            'id_user'   => $user['id_user'],
            'nom'       => $user['nom'],
            'email'     => $user['email'],
            'logged_in' => true
        ]);

        return true;
    }

    /**
     * Déconnexion de l'utilisateur
     */
    public function deconnexion()
    {
        session()->destroy();
        return redirect()->to(site_url('Connexion'));
    }
}
