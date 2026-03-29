<?php 
/**namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
    public function register() {
        $userModel = new UserModel();

        // Récupération des données du formulaire
        $date_naissance = $this->request->getPost('date_naissance');

        // Vérification si la date est au bon format (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_naissance)) {
            return redirect()->to('/Formulaire')->with('error', 'Format de date invalide.');
        }

        $data = [
            'prenom' => $this->request->getPost('prenom'),
            'nom' => $this->request->getPost('nom'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'date_naissance' => $date_naissance,
            'genre' => $this->request->getPost('genre'),
        ];

        // Insertion dans la base de données
        if ($userModel->insertUser($data)) {
            return redirect()->to('/login')->with('success', 'Inscription réussie !');
        } else {
            return redirect()->to('/Formulaire')->with('error', 'Erreur lors de l’inscription.');
        }
    }

    public function login() {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user_id', $user['id_user']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Identifiants incorrects.');
        }
    }
}
