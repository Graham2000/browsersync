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
            'collections' => $collections,
            'scripts' => ['/assets/js/collections.js']
        ];
        
        $view = __DIR__ . '/../Views/collections/index.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processAddCollection();
        } else {
            $data = [
                'title' => 'Add Collection - BrowserSync'
            ];
            
            $view = __DIR__ . '/../Views/collections/add.php';
            include __DIR__ . '/../Views/layouts/app.php';
        }
    }

    private function processAddCollection()
    {
        $title = $_POST['title'] ?? '';
        
        if (empty($title)) {
            $data = [
                'title' => 'Add Collection - BrowserSync',
                'error' => 'Collection title is required'
            ];
            
            $view = __DIR__ . '/../Views/collections/add.php';
            include __DIR__ . '/../Views/layouts/app.php';
            return;
        }

        $this->collectionModel->addCollection($title);
        
        header('Location: /collections');
        exit;
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
            'bookmarks' => $bookmarks,
            'scripts' => ['/assets/js/bookmarks.js']
        ];
        
        $view = __DIR__ . '/../Views/collections/collection.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function delete($params)
    {
        $collectionId = $params['collection_id'] ?? null;

        if (!$collectionId) {
            header('Location: /collections');
            exit;
        }

        try {
            $this->collectionModel->deleteCollection($collectionId);
            header('Location: /collections');
            exit;
        } catch (\Exception $e) {
            header('Location: /collections?error=Failed to delete collection');
            exit;
        }
    }
}