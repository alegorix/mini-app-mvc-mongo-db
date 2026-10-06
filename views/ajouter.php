<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Utilisateur</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { max-width: 400px; }
        input { width: 100%; padding: 8px; margin-bottom: 12px; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Ajouter un Utilisateur</h2>
    <form method="POST" action="index.php?action=create">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Prénom :</label>
        <input type="text" name="prenom">

        <label>Email :</label>
        <input type="email" name="email" required>

        <button type="submit">Enregistrer</button>
        <a href="index.php">Annuler</a>
    </form>

</body>
</html>
