<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections - BrowserSync</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="max-w-6xl mx-auto px-4 py-8 h-screen">

        <div class="grid grid-cols-3 gap-4 h-full">
            <?php include __DIR__ . '/../partials/sidebar.php'; ?>
            
            <div id="collections" class="h-full col-span-2 ml-8 p-6">
                <div class="flex flex-row gap-2">
                    <h1 class="text-2xl font-bold mb-4 flex-auto">Collections</h1>
                    <a href="/collections/add" id="addCollectionButton" class="bg-gray-200 text-black px-4 py-2 rounded-md flex items-center justify-center">Add Collection</a>
                </div>

                <div class="flex flex-col gap-2 mt-10">
                    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-row collection-item">
                        <h2 class="text-lg flex-auto">Collection 1</h2>
                        <div class="text-gray-600">(5)</div>
                    </div>
                    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-row mt-4 collection-item">
                        <h2 class="text-lg flex-auto">Collection 2</h2>
                        <div class="text-gray-600">(3)</div>
                    </div>
                    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-row mt-4 collection-item">
                        <h2 class="text-lg flex-auto">Collection 3</h2>
                        <div class="text-gray-600">(8)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="/assets/js/collections.js"></script>