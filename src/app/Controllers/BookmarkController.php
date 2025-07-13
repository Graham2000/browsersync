<?php

namespace App\Controllers;

use Core\Database;
use App\Models\CollectionModel;
use App\Models\BookmarkModel;

class BookmarkController
{
    public function bookmarks()
    {
        $bookmarkModel = new BookmarkModel();
        $bookmarks = $bookmarkModel->getBookmarks();

        $data = [
            'title' => 'Bookmarks - BrowserSync',
            'bookmarks' => $bookmarks
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/index.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function add($params = [])
    {
        $collectionModel = new CollectionModel();
        $collectionId = $params['collection_id'] ?? null;
        $collectionName = $collectionModel->getCollectionNameById($collectionId);

        $data = [
            'title' => 'Add Bookmark - BrowserSync',
            'collectionId' => $collectionId,
            'collectionName' => $collectionName
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/add.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }
}