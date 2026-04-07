<?php 

namespace App\Controllers\PageVitrine;

use App\Models\SiteReservationModel;
use App\Controllers\BaseController;

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
        $isAdmin = $this->session->get('role') === 'admin' || (int) $this->session->get('id_user') === 1;
        if (!$this->session->has('id_user') || !$isAdmin) {
            return redirect()->to(site_url('Connexion'));
        }

        $idReservation = $this->request->getPost('idReservation');
        $action = $this->request->getPost('action');

        if (!empty($idReservation) && is_numeric($idReservation) && in_array($action, ['valider', 'annuler'], true)) {
            $newStatus = $action === 'valider' ? 'Validee' : 'Annulee';
            $this->siteReservationModel->updateisValide($idReservation, $newStatus);
            return redirect()->to(site_url('PageAdmin'))->with('success', 'Reservation mise a jour avec succes.');
        }

        echo view('template/header', ['iduser' => $this->session->get('id_user')]);
        echo view("form/pageadmin", [
            'tabReservation' => $this->siteReservationModel->getAllReservationsWithUser()
        ]);

    }
}
