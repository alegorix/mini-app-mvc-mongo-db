<?php
namespace App\Models;

use MongoDB\Client;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

class User {
    private $collection;

    public function __construct() {
        // Connexion au serveur MongoDB et sélection de la collection
        $client = new Client("mongodb://localhost:27017");
        $this->collection = $client->selectDatabase('gestion_users')->selectCollection('utilisateurs');
    }

    // Récupérer tous les utilisateurs
    public function getAll() {
        return $this->collection->find([]);
    }

    // Récupérer un utilisateur par son _id
    public function getById(string $id) {
        try {
            return $this->collection->findOne(['_id' => new ObjectId($id)]);
        } catch (\Exception $e) {
            return null;
        }
    }

    // Créer un utilisateur
    public function create(array $data) {
        return $this->collection->insertOne([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'cree_le' => new UTCDateTime()
        ]);
    }

    // Mettre à jour un utilisateur
    public function update(string $id, array $data) {
        return $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => [
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email']
            ]]
        );
    }

    // Supprimer un utilisateur
    public function delete(string $id) {
        return $this->collection->deleteOne(['_id' => new ObjectId($id)]);
    }
}
