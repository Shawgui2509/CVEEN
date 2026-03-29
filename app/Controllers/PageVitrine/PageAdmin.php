<?php 

namespace App\Controllers;

use App\Models\SiteReservationModel;

class PageAdmin extends BaseController
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
        if (!$this->session->has('id_user') || $this->session->get('role') !== 'admin') {
            return redirect()->to(site_url('Connexion'));
        }

        $idReservation = $this->request->getPost('idReservation');
        if (!empty($idReservation) && is_numeric($idReservation)) {
            $this->siteReservationModel->updateisValide($idReservation, "Annulée");
            return redirect()->to(site_url('PageAdmin'))->with('success', 'Réservation annulée avec succès.');
        }

        echo view('template/header', ['iduser' => $this->session->get('id_user')]);
        echo view("form/pageadmin", [
            'tabReservation' => $this->siteReservationModel->getLesReservationsByUser($this->session->get('id_user'))
        ]);
        echo view("form/pageadmin", [
            'tabReservation' => $this->siteReservationModel->getAllReservationsWithUser()
        ]);

    }
}
