<?php

include 'ajoute.php';

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $auteur = $_POST['auteur'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    // Vérifier l'image
    $image = $user['image']; // Garder l'image actuelle par défaut
    if (!empty($_FILES['image']['name'])) {
        $image = "assets/images/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    // Mettre à jour les informations
    $sql = "UPDATE users SET name = :name, auteur = :auteur, prix = :prix, description = :description, image = :image WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: read.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook</title>
    <script src="edit.js"></script>
</head>
<body>
    <section class="cards grid grid-cols-3 gap-4">
        <?php if (count($users) > 0): ?>
        <?php foreach ($users as $user): ?>
        <div class="max-w-md mx-auto rounded-md overflow-hidden shadow-md hover:shadow-lg">
            <div class="relative">
            <img class="w-full" src="assets/images/<?= htmlspecialchars($user['image']) ?>" alt="Product Image">
            </div>
            <div class="p-4">
                <div class="mb-2 flex items-center justify-between">
                    <h6 class="font-sans antialiased font-bold text-base md:text-lg lg:text-xl text-current"><?= htmlspecialchars($user['name']) ?></h6>
                    <h6 class="font-sans antialiased font-bold text-base md:text-lg lg:text-xl text-current"><?= htmlspecialchars($user['prix']) ?>£</h6>
                </div>
                <p class="text-gray-600 text-sm mb-4"><?= htmlspecialchars($user['description']) ?></p>
                <p class="text-blue-800 text-sm mb-4"><?= htmlspecialchars($user['auteur']) ?></p>
                <div class="flex items-center justify-between">
                    <button class="bg-zinc-500 hover:bg-zinc-600 text-white font-bold py-2 px-4 rounded" onclick="openModal(<?= $user['id'] ?>)" type="button">
                        Amendment
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Delete</a>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <h6 colspan="4">Aucun livre trouvé.</h6>
        <?php endif; ?>
    </section>


    <?php 

    include 'edit.php';
    ?>
</body>
</html>





