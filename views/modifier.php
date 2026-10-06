<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Utilisateur</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { max-width: 400px; }
        input { width: 100%; padding: 8px; margin-bottom: 12px; }
        button { padding: 10px 15px; background: #0066cc; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Modifier l'Utilisateur</h2>
    <form method="POST" action="index.php?action=edit&id=<?= $user['_id'] ?>">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($user['nom'] ?? '') ?>" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom'] ?? '') ?>">

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>

        <button type="submit">Mettre à jour</button>
        <a href="index.php">Annuler</a>
    </form>

</body>
</html>
