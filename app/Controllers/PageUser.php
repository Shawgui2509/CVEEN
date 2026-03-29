<?php 

namespace App\Controllers;

use App\Models\SiteReservationModel;

class PageUser extends BaseController
{
    protected $siteReservationModel;
    protected $session;

    public function __construct()
    {
        helper('form');
        $this->session = session();
        $this->siteReservationModel = new SiteReservationModel();
    }

    public function index() 
    {
        // Vérification de la connexion utilisateur
        if (!$this->session->has('id_user')) {
            return redirect()->to(site_url('Connexion'));
        }

        // Récupération et validation de l'ID réservation
        $idReservation = $this->request->getPost('idReservation');
        if (!empty($idReservation) && is_numeric($idReservation)) {
            $this->siteReservationModel->updateisValide($idReservation, "Annulée");
        }

        // Chargement des vues avec les données utilisateur
        echo view('template/header', ['iduser' => $this->session->get('id_user')]);
        echo view("form/pageuser", [
            'tabReservation' => $this->siteReservationModel->getLesReservationsByUser($this->session->get('id_user'))
        ]);
    }
}
