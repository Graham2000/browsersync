<div class="flex flex-col gap-2">
    <h1 class="text-2xl font-bold mb-4 flex-auto">Edit Bookmark</h1>
</div>

<form action="/collections/<?= $data['bookmark']['collection_id'] ?>/bookmarks/<?= $data['bookmark']['id'] ?>/update" method="post" class="flex flex-col gap-2">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" value="<?= $data['bookmark']['title'] ?>" class="border border-gray-300 rounded-md p-2">
    <label for="url">URL</label>
    <input type="text" name="url" placeholder="URL" value="<?= $data['bookmark']['url'] ?>" class="border border-gray-300 rounded-md p-2">
    <label for="description">Description</label>
    <input type="text" name="description" placeholder="Description" value="<?= $data['bookmark']['description'] ?>" class="border border-gray-300 rounded-md p-2">
    <label for="tags">Tags</label>
    <input type="text" name="tags" placeholder="Tags (comma separated)" value="<?= $data['bookmark']['tags'] ?>" class="border border-gray-300 rounded-md p-2">

    <div class="flex flex-row gap-2 mt-4">
        <form action="/collections/<?= $data['bookmark']['collection_id'] ?>/bookmarks/<?= $data['bookmark']['id'] ?>/update" method="post">
            <button type="submit" class="bg-gray-200 text-black px-4 py-2 rounded-md">Save</button>
        </form>
        <a href="/collection/<?= $data['bookmark']['collection_id'] ?>" class="bg-gray-200 text-black px-4 py-2 rounded-md">Cancel</a>
    </div>
</form>