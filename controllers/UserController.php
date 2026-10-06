<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // Afficher la liste de tous les utilisateurs
    public function index() {
        $utilisateurs = $this->userModel->getAll();
        require __DIR__ . '/../views/index.php';
    }

    // Afficher le formulaire d'ajout et enregistrer
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');

            if (!empty($nom) && !empty($email)) {
                $this->userModel->create([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email
                ]);
                header('Location: index.php');
                exit;
            }
        }
        require __DIR__ . '/../views/ajouter.php';
    }

    // Afficher le formulaire de modification et enregistrer
    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php');
            exit;
        }

        $user = $this->userModel->getById($id);
        if (!$user) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');

            if (!empty($nom) && !empty($email)) {
                $this->userModel->update($id, [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email
                ]);
                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../views/modifier.php';
    }

    // Supprimer un utilisateur
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->userModel->delete($id);
        }
        header('Location: index.php');
        exit;
    }
}
