<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs - MVC MongoDB</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        a.btn { padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
        a.action-link { text-decoration: none; color: #0066cc; }
    </style>
</head>
<body>

    <h2>Gestion des Utilisateurs (Architecture MVC)</h2>
    <a href="index.php?action=create" class="btn">+ Ajouter un utilisateur</a>

    <table>
        <thead>
            <tr>
                <th>ID (BSON)</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $user): ?>
            <tr>
                <td><?= $user['_id'] ?></td>
                <td><?= htmlspecialchars($user['nom'] ?? '') ?></td>
                <td><?= htmlspecialchars($user['prenom'] ?? '') ?></td>
                <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $user['_id'] ?>" class="action-link">Modifier</a> | 
                    <a href="index.php?action=delete&id=<?= $user['_id'] ?>" class="action-link" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
