<?php
require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;
use MongoDB\BSON\UTCDateTime;

echo "=== Initialisation de la base de données MongoDB ===\n\n";

try {
    // 1. Connexion au serveur
    $client = new Client("mongodb://localhost:27017");
    $db = $client->selectDatabase('gestion_users');
    $collection = $db->selectCollection('utilisateurs');

    // 2. Nettoyage éventuel (Optionnel : décommentez pour repartir de zéro)
    // $collection->drop();

    // 3. Création d'un index unique sur le champ 'email'
    $collection->createIndex(['email' => 1], ['unique' => true]);
    echo "[✔] Index unique créé sur le champ 'email'.\n";

    // 4. Insertion de données de démonstration (seulement si la collection est vide)
    if ($collection->countDocuments() === 0) {
        $usersDemo = [
            [
                'nom' => 'Dupont',
                'prenom' => 'Alice',
                'email' => 'alice.dupont@example.com',
                'cree_le' => new UTCDateTime()
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Bob',
                'email' => 'bob.martin@example.com',
                'cree_le' => new UTCDateTime()
            ],
            [
                'nom' => 'Durand',
                'prenom' => 'Charlie',
                'email' => 'charlie.durand@example.com',
                'cree_le' => new UTCDateTime()
            ]
        ];

        $result = $collection->insertMany($usersDemo);
        echo "[✔] " . $result->getInsertedCount() . " utilisateurs de démonstration insérés.\n";
    } else {
        echo "[i] La collection contient déjà des documents. Aucun ajout effectué.\n";
    }

    echo "\n=== Configuration terminée avec succès ! ===\n";

} catch (Exception $e) {
    echo "[✘] Erreur lors de l'initialisation : " . $e->getMessage() . "\n";
}
