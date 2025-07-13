<div id="bookmarks" class="h-full col-span-2 ml-8 p-3">
    <div class="flex flex-row gap-2">
        <div class="flex flex-row w-full justify-between items-center">
            <a href="/collections" id="backButton" class="bg-gray-200 text-black px-4 py-2 rounded-md flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Back to collections
            </a>
            <a href="/collections/<?= $data['id'] ?>/bookmarks/add" id="addBookmarkButton" class="bg-gray-200 text-black px-4 py-2 rounded-md">Add Bookmark</a>
        </div>
    </div>

    <h1 class="text-2xl font-bold mb-4 mt-10"><?= $data['collectionName'] ?></h1>

    <div class="flex flex-col gap-2 mt-10">
        <?php foreach ($data['bookmarks'] as $bookmark) : ?>
        <div class="border border-gray-300 text-black px-4 py-6 rounded-md flex flex-col mt-4 collection-item">
            <h2 class="text-lg flex-auto">
                <a href="<?= $bookmark['url'] ?>" target="_blank"><?= $bookmark['title'] ?></a>
            </h2>
            <div class="text-gray-600 mt-2"><?= $bookmark['description'] ?></div>
            <div class="flex flex-row gap-2 mt-4">
                <?php if ($bookmark['tags']) : ?>
                    <?php $tags = explode(',', $bookmark['tags']); ?>
                    <?php foreach ($tags as $tag) : ?>
                        <div class="bg-gray-200 text-black px-4 py-2 rounded-md">#<?= $tag; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="flex flex-row gap-2 mt-6">
                <button class="bg-gray-200 text-black px-4 py-2 rounded-md">Edit</button>

                <form action="/collections/<?= $data['id'] ?>/bookmarks/<?= $bookmark['id'] ?>/delete" method="post" style="display: inline;">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('Delete this bookmark?')">Delete</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
