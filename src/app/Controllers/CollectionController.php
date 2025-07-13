<?php

namespace App\Controllers;

use App\Models\CollectionModel;
use App\Models\BookmarkModel;

class CollectionController
{
    private $collectionModel;

    public function __construct()
    {
        $this->collectionModel = new CollectionModel();
    }

    public function collections()
    {
        $collections = $this->collectionModel->getCollections();

        $data = [
            'title' => 'Collections - BrowserSync',
            'collections' => $collections
        ];
        
        $view = __DIR__ . '/../Views/collections/index.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function add()
    {
        $data = [
            'title' => 'Add Collection - BrowserSync'
        ];
        
        $view = __DIR__ . '/../Views/collections/add.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function collection($params = [])
    {
        $bookmarkModel = new BookmarkModel();
        $id = $params['id'] ?? null;
        $bookmarks = $bookmarkModel->getBookmarks($id);
        
        $collectionName = $this->collectionModel->getCollectionNameById($id);

        $data = [
            'title' => 'Collection ' . $id . ' - BrowserSync',
            'collectionName' => $collectionName,
            'id' => $id,
            'bookmarks' => $bookmarks
        ];
        
        $view = __DIR__ . '/../Views/collections/collection.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }
}