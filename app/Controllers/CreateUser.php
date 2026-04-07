<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class CreateUser extends Controller
{
        public function index()
    {
        return view('form/register'); // Assurez-vous que la vue "register.php" existe bien dans "app/Views/"
    }
  
    public function register()
    {
        helper('form');
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'prenom' => 'required|alpha',
                'nom' => 'required|alpha',
                'date_naissance' => 'required|valid_date[Y-m-d]',
                'genre' => 'in_list[Homme,Femme,Autre]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[4]|max_length[30]',
            ];

            $messages = [
                'prenom' => ['required' => 'Le prénom est requis.', 'alpha' => 'Le prénom ne doit contenir que des lettres.'],
                'nom' => ['required' => 'Le nom est requis.', 'alpha' => 'Le nom ne doit contenir que des lettres.'],
                'date_naissance' => ['required' => 'La date de naissance est requise.', 'valid_date' => 'Format de date invalide.'],
                'email' => ['required' => "L'email est requis.", 'valid_email' => 'Email invalide.'],
                'password' => ['required' => 'Le mot de passe est requis.', 'min_length' => 'Le mot de passe doit contenir au moins 4 caractères.', 'max_length' => 'Le mot de passe ne peut pas dépasser 30 caractères.']
            ];

            if (!$this->validate($rules, $messages)) {
                return view('form/register', ['validation' => $this->validator]);
            }

            $userModel = new UserModel();

            if ($userModel->emailExists((string) $this->request->getPost('email'))) {
                return redirect()->back()->withInput()->with('error', 'Cet email est deja utilise.');
            }

            $userData = [
                'prenom' => $this->request->getPost('prenom'),
                'nom' => $this->request->getPost('nom'),
                'date_naissance' => $this->request->getPost('date_naissance'),
                'genre' => $this->request->getPost('genre'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            
            try {
                if ($userModel->insert($userData)) {
                    return redirect()->to(site_url('Connexion'))->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
                } else {
                    return redirect()->back()->with('error', "Erreur lors de l'enregistrement en base de données.");
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage());
            }
        }
        
        return view('form/register');
    }
}

///