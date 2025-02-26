<?php 

include 'index.php';

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

if(isset($_POST['envoyer'])) {
    $name = $_POST['book_name'];
    $auteur = $_POST['author'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    

    if (!is_numeric($prix)) {
        die("Le prix doit être un nombre !");
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("Veuillez sélectionner une image valide !");
    }

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = mime_content_type($image_tmp);

    // Vérifier le type de fichier (seulement JPG, PNG, GIF)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image_type, $allowed_types)) {
        die("Format d'image non autorisé ! (JPG, PNG, GIF uniquement)");
    }

    // Donner un nom unique à l'image pour éviter les conflits
    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_unique_name = uniqid("book_", true) . "." . $image_extension;
    $target = "assets/images/" . $image_unique_name;

    $upload_dir = "assets/images/";

    // Vérifie et crée le dossier si nécessaire
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Récupérer les informations du fichier
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Vérifier que l'image est bien reçue
    if (empty($image)) {
        die("Aucune image reçue !");
    }

    // Générer un nom unique pour l'image
    $image_unique_name = "book_" . uniqid() . "." . pathinfo($image, PATHINFO_EXTENSION);
    $target = $upload_dir . $image_unique_name;

    // Déplacer l’image vers le dossier
    if (!move_uploaded_file($image_tmp, $target)) {
        die("Erreur lors du téléchargement de l'image !");
    }

    // Maintenant, insérer dans la base de données
    $sql = "INSERT INTO users (name, description, image, prix, auteur) VALUES (:name, :description, :image, :prix, :auteur)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image_unique_name);
    $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
    $stmt->bindParam(':auteur', $auteur);

    if ($stmt->execute()) {
        echo "Livre ajouté avec succès!";
        header("Location: read.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout.";
    }
    }
?>
