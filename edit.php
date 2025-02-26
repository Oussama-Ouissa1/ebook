<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="edit.js"></script>
</head>
<body>
<section id="afiche" class="fixed top-0 left-0 right-0 text-white p-4 z-50">
        <div id="open" class="bg-white border border-4 rounded-lg shadow relative m-10 hidden">

            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Edit Book</h3>
            </div>

            <div class="p-6 space-y-6">
                <form method="post" action="read.php" enctype="multipart/form-data">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="book-name" class="text-sm font-medium text-gray-900 block mb-2">Book Name</label>
                            <input type="text" name="book_name" id="book-name" value="<?= htmlspecialchars($user['name']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Antigone" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="author" class="text-sm font-medium text-gray-900 block mb-2">Author</label>
                            <input type="text" name="author" id="author" value="<?= htmlspecialchars($user['auteur']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Jean Anouilh" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                            <input type="file" name="image" id="image" value="<?= htmlspecialchars($user['image']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="URL" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                            <input type="number" name="prix" id="price" value="<?= htmlspecialchars($user['prix']) ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required>
                        </div>
                        <div class="col-span-full">
                            <label for="book-details" class="text-sm font-medium text-gray-900 block mb-2">Book Details</label>
                            <textarea name="description" id="book-details" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Details" required><?= htmlspecialchars($user['description']) ?></textarea>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 rounded-b mb-2 flex items-center justify-between">
                        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" name="update">Update</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="closenModal()">Quit</a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>