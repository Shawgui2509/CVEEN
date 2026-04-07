<?php

namespace App\Controllers;

use App\Models\SiteReservationModel;

class ReservationController extends BaseController
{
    public function create()
    {
        $session = session();

        if (! $session->has('id_user')) {
            return $this->response->setStatusCode(401)->setJSON([
                'success' => false,
                'message' => 'Vous devez etre connecte pour reserver.',
            ]);
        }

        $payload = $this->request->getJSON(true);

        if (! is_array($payload)) {
            $payload = $this->request->getPost();
        }

        $datedebut = trim((string) ($payload['datedebut'] ?? ''));
        $datefin = trim((string) ($payload['datefin'] ?? ''));
        $nbpersonne = (int) ($payload['nbpersonne'] ?? 0);
        $pension = trim((string) ($payload['pension'] ?? 'N'));
        $typelogement = trim((string) ($payload['typelogement'] ?? 'offre'));

        if ($datedebut === '' || $datefin === '' || $nbpersonne <= 0) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'Donnees de reservation incompletes.',
            ]);
        }

        if ($datedebut >= $datefin) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'La date de depart doit etre apres la date d\'arrivee.',
            ]);
        }

        $model = new SiteReservationModel();
        $reservationId = $model->createReservation([
            'id_user' => $session->get('id_user'),
            'datedebut' => $datedebut,
            'datefin' => $datefin,
            'nbpersonne' => $nbpersonne,
            'pension' => $pension,
            'typelogement' => $typelogement,
            'valide' => 'En attente de validation',
            'menage' => true,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'id_reservation' => $reservationId,
            'message' => 'Reservation enregistree et en attente de validation.',
        ]);
    }
}
