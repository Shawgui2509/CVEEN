<?php
namespace App\Models;

use App\Libraries\MongoConnection;

class UserModel
{
    protected $collection;
    protected $pendingFilter = [];

    public function __construct()
    {
        $this->collection = MongoConnection::database()->selectCollection('users');
    }

    public function where(string $field, $value): self
    {
        $this->pendingFilter[$field] = $value;
        return $this;
    }

    public function first(): ?array
    {
        $doc = $this->collection->findOne($this->pendingFilter);
        $this->pendingFilter = [];

        if ($doc === null)
        {
            return null;
        }

        return (array) $doc;
    }

    public function insert(array $data): bool
    {
        $data['id_user'] = $data['id_user'] ?? $this->nextId();
        $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
        $data['updated_at'] = $data['updated_at'] ?? date('Y-m-d H:i:s');
        $data['role'] = $data['role'] ?? 'user';
        $data['essai'] = $data['essai'] ?? 0;

        file_put_contents('/var/www/html/writable/logs/insert_debug.log', 
            date('Y-m-d H:i:s') . " - Tentative d'insertion: " . json_encode($data) . "\n", 
            FILE_APPEND);

        try {
            $result = $this->collection->insertOne($data);
            file_put_contents('/var/www/html/writable/logs/insert_debug.log', 
                date('Y-m-d H:i:s') . " - Insertion réussie: " . ($result->isAcknowledged() ? 'OUI' : 'NON') . "\n", 
                FILE_APPEND);
            return $result->isAcknowledged();
        } catch (\Exception $e) {
            file_put_contents('/var/www/html/writable/logs/insert_debug.log', 
                date('Y-m-d H:i:s') . " - ERREUR: " . $e->getMessage() . "\n", 
                FILE_APPEND);
            return false;
        }
    }

    public function emailExists(string $email): bool
    {
        return $this->collection->countDocuments(['email' => $email], ['limit' => 1]) > 0;
    }

    public function getUserByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function insertUser(array $data): bool
    {
        return $this->insert($data);
    }

    protected function nextId(): int
    {
        $last = $this->collection->findOne([], ['sort' => ['id_user' => -1], 'projection' => ['id_user' => 1]]);
        if ($last === null || ! isset($last['id_user']))
        {
            return 1;
        }

        return (int) $last['id_user'] + 1;
    }
}
