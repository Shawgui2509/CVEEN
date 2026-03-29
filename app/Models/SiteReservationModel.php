<?php
namespace App\Models;

use App\Libraries\MongoConnection;

/**
 * Acces MongoDB pour les reservations utilisateur.
 */
class SiteReservationModel
{
    protected $reservations;
    protected $users;

    public function __construct()
    {
        $db = MongoConnection::database();
        $this->reservations = $db->selectCollection('reservations');
        $this->users = $db->selectCollection('users');
    }

    public function getLesReservationsByUser($id_user): array
    {
        $id = (int) $id_user;
        $user = $this->users->findOne(['id_user' => $id], ['projection' => ['nom' => 1]]);
        $nom = $user['nom'] ?? '';

        $cursor = $this->reservations->find(['id_user' => $id], ['sort' => ['datedebut' => -1]]);
        $rows = [];

        foreach ($cursor as $doc)
        {
            $row = (array) $doc;
            $row['nom'] = $nom;
            $rows[] = $row;
        }

        return $rows;
    }
    public function updateisValide($id_reservation, $valide = 'Valide') : void
    {
        $this->reservations->updateOne(
            ['id_reservation' => (int) $id_reservation],
            ['$set' => ['valide' => $valide]]
        );
    }
}