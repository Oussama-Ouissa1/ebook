
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="edit.js"></script>
</head>
<body>
    <section>
        <div class="bg-white border border-4 rounded-lg shadow relative m-10">

            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Ajoute Book</h3>
            </div>
            
            <div class="p-6 space-y-6">
                <form method="post" action="ajoute.php" enctype="multipart/form-data">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="book-name" class="text-sm font-medium text-gray-900 block mb-2">Book Name</label>
                            <input type="text" name="book_name" id="book-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Antigone" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="author" class="text-sm font-medium text-gray-900 block mb-2">Author</label>
                            <input type="text" name="author" id="author" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Jean Anouilh" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                            <input type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="URL" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                            <input type="number" name="prix" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required>
                        </div>
                        <div class="col-span-full">
                            <label for="book-details" class="text-sm font-medium text-gray-900 block mb-2">Book Details</label>
                            <textarea name="description" id="book-details" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Details" required></textarea>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 rounded-b">
                        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" name="envoyer" type="submit">Save all</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>


