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

        // Actions utilisateur sur une reservation
        $idReservation = $this->request->getPost('idReservation');
        $action = $this->request->getPost('action');
        if (!empty($idReservation) && is_numeric($idReservation)) {
            $reservationId = (int) $idReservation;
            $userId = (int) $this->session->get('id_user');

            if ($action === 'annuler') {
                $this->siteReservationModel->updateisValide($reservationId, 'Annulee');
            }

            if ($action === 'supprimer') {
                $this->siteReservationModel->deleteCancelledReservationByUser($reservationId, $userId);
            }
        }

        // Chargement des vues avec les données utilisateur
        echo view('template/header', ['iduser' => $this->session->get('id_user')]);
        echo view("form/pageuser", [
            'tabReservation' => $this->siteReservationModel->getLesReservationsByUser($this->session->get('id_user'))
        ]);
    }
}
