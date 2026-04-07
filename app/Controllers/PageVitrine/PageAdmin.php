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
        $isAdmin = $this->session->get('role') === 'admin';
        if (!$this->session->has('id_user') || !$isAdmin) {
            return redirect()->to(site_url('Connexion'));
        }

        $idReservation = $this->request->getPost('idReservation');
        $action = $this->request->getPost('action');

        if (!empty($idReservation) && is_numeric($idReservation) && in_array($action, ['valider', 'annuler'], true)) {
            $newStatus = $action === 'valider' ? 'Validee' : 'Annulee';
            $this->siteReservationModel->updateisValide($idReservation, $newStatus);
            $message = $action === 'valider'
                ? 'Reservation validee avec succes.'
                : 'Reservation annulee avec succes.';

            return redirect()->to(site_url('PageAdmin'))
                ->with('banner_type', $action === 'valider' ? 'success' : 'danger')
                ->with('banner_message', $message);
        }

        echo view('template/header', ['iduser' => $this->session->get('id_user')]);
        echo view("form/pageadmin", [
            'tabReservation' => $this->siteReservationModel->getAllReservationsWithUser()
        ]);

    }
}
