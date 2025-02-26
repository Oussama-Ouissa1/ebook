<?php
// Connexion à la base de données
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ebook";

try {
    $conn = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si un ID est passé
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer l'utilisateur
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirection après suppression
        header("Location: read.php");
        exit(); // Arrête l'exécution ici pour éviter les erreurs
    } else {
        echo "❌ Erreur lors de la suppression.";
    }
} else {
    echo "❌ ID invalide.";
}
?>

