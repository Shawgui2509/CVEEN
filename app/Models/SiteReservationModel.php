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

    public function createReservation(array $data): int
    {
        $reservationId = $this->nextReservationId();

        $document = [
            'id_reservation' => $reservationId,
            'id_user' => (int) $data['id_user'],
            'datedebut' => (string) $data['datedebut'],
            'datefin' => (string) $data['datefin'],
            'nbpersonne' => (int) $data['nbpersonne'],
            'pension' => (string) ($data['pension'] ?? 'N'),
            'menage' => (bool) ($data['menage'] ?? true),
            'typelogement' => (string) ($data['typelogement'] ?? 'offre'),
            'valide' => (string) ($data['valide'] ?? 'En attente de validation'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->reservations->insertOne($document);

        return $reservationId;
    }

    public function getAllReservationsWithUser(): array
    {
        $pipeline = [
            [
                '$lookup' => [
                    'from' => 'users',
                    'localField' => 'id_user',
                    'foreignField' => 'id_user',
                    'as' => 'userData',
                ],
            ],
            [
                '$unwind' => [
                    'path' => '$userData',
                    'preserveNullAndEmptyArrays' => true,
                ],
            ],
            [
                '$addFields' => [
                    'nom' => ['$ifNull' => ['$userData.nom', '']],
                ],
            ],
            [
                '$project' => [
                    'userData' => 0,
                ],
            ],
            [
                '$sort' => [
                    'datedebut' => -1,
                ],
            ],
        ];

        $rows = [];
        $cursor = $this->reservations->aggregate($pipeline);

        foreach ($cursor as $doc)
        {
            $rows[] = (array) $doc;
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

    public function deleteCancelledReservationByUser(int $id_reservation, int $id_user): bool
    {
        $result = $this->reservations->deleteOne([
            'id_reservation' => $id_reservation,
            'id_user' => $id_user,
            'valide' => ['$in' => ['Annulee', 'Annulée']],
        ]);

        return $result->getDeletedCount() > 0;
    }

    private function nextReservationId(): int
    {
        $last = $this->reservations->findOne([], ['sort' => ['id_reservation' => -1], 'projection' => ['id_reservation' => 1]]);

        if ($last === null || ! isset($last['id_reservation']))
        {
            return 1;
        }

        return (int) $last['id_reservation'] + 1;
    }
}