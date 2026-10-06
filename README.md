# Mini-App MVC PHP & MongoDB

Projet de gestion d'utilisateurs (CRUD) développé en **PHP natif** selon le patron d'architecture **MVC**, utilisant **MongoDB** comme base de données NoSQL.

---

## Prérequis

1. **PHP 8.x** (ou supérieur).
2. **Extension C MongoDB pour PHP** active (`ext-mongodb`).
3. **Composer** installé globalement.
4. Un serveur **MongoDB** local en cours d'exécution sur `mongodb://localhost:27017`.

---

## Structure du Projet

```text
mini-app-mvc-mongo-db/
├── composer.json
├── index.php             # Routeur principal
├── setup.php             # Script d'initialisation DB
├── models/
│   └── User.php          # Interaction avec MongoDB
├── controllers/
│   └── UserController.php# Logique applicative
└── views/
    ├── index.php         # Liste des utilisateurs
    ├── ajouter.php       # Formulaire de création
    └── modifier.php      # Formulaire d'édition
