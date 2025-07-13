<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks - BrowserSync</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="max-w-6xl mx-auto px-4 py-8 h-screen">

        <div class="grid grid-cols-3 gap-4 h-full">
            <?php include __DIR__ . '/../partials/sidebar.php'; ?>
            
            <div id="bookmarks" class="h-full col-span-2 ml-8 p-6">
                <div class="flex flex-row gap-2">
                    <div class="flex flex-row w-full justify-between items-center">
                        <a href="/collections" id="backButton" class="bg-gray-200 text-black px-4 py-2 rounded-md flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                            Back to collections
                        </a>
                        <a href="/bookmarks/add" id="addBookmarkButton" class="bg-gray-200 text-black px-4 py-2 rounded-md">Add Bookmark</a>
                    </div>
                </div>

                <h1 class="text-2xl font-bold mb-4 mt-10">Collection 1</h1>

                <div class="flex flex-col gap-2 mt-10">
                    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-col mt-4 collection-item">
                        <h2 class="text-lg flex-auto">
                            <a href="https://www.google.com" target="_blank">Bookmark 1</a>
                        </h2>
                        <div class="text-gray-600 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</div>
                        <div class="flex flex-row gap-2 mt-4">
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag1</div>
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag2</div>
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag3</div>
                        </div>
                        <div class="flex flex-row gap-2 mt-6">
                            <button class="bg-gray-200 text-black px-4 py-2 rounded-md">Edit</button>
                            <button class="bg-gray-200 text-black px-4 py-2 rounded-md">Delete</button>
                        </div>
                    </div>
                    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-col mt-4 collection-item">
                        <h2 class="text-lg flex-auto">
                            <a href="https://www.google.com" target="_blank">Bookmark 2</a>
                        </h2>
                        <div class="text-gray-600 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</div>
                        <div class="flex flex-row gap-2 mt-4">
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag1</div>
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag2</div>
                            <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#tag3</div>
                        </div>
                        <div class="flex flex-row gap-2 mt-6">
                            <button class="bg-gray-200 text-black px-4 py-2 rounded-md">Edit</button>
                            <button class="bg-gray-200 text-black px-4 py-2 rounded-md">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>  

<script src="assets/js/bookmarks.js"></script>