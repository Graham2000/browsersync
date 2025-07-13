<div class="flex flex-row gap-2">
    <h1 class="text-2xl font-bold mb-4 flex-auto">Collections</h1>
    <a href="/collections/add" id="addCollectionButton" class="bg-gray-200 text-black px-4 py-2 rounded-md flex items-center justify-center">Add Collection</a>
</div>

<div class="flex flex-col gap-2 mt-10">
    <?php foreach ($data['collections'] as $collection) : ?>
    <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-row collection-item" data-id="<?= $collection['id'] ?>">
        <h2 class="text-lg flex-auto"><?= $collection['title'] ?></h2>
        <div class="text-gray-600"><?= $collection['count'] ?></div>
    </div>
    <?php endforeach; ?>
</div> 