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
            'bookmarks' => $bookmarks,
            'scripts' => ['/assets/js/bookmarks.js']
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/index.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function add($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processAddBookmark($params);
        } else {
            $collectionModel = new CollectionModel();
            $collectionId = $params['collection_id'] ?? null;
            $collectionName = $collectionModel->getCollectionNameById($collectionId);

            $data = [
                'title' => 'Add Bookmark - BrowserSync',
                'collectionId' => $collectionId,
                'collectionName' => $collectionName,
                'scripts' => ['/assets/js/bookmarks.js']
            ];
            
            $view = __DIR__ . '/../Views/bookmarks/add.php';
            include __DIR__ . '/../Views/layouts/app.php';
        }
    }

    private function processAddBookmark($params)
    {
        $collectionId = $params['collection_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $url = $_POST['url'] ?? '';
        $description = $_POST['description'] ?? '';
        $tags = $_POST['tags'] ?? '';

        if (empty($title) || empty($url)) {
            // Validation failed - redirect back to form with error
            header('Location: /collections/' . $collectionId . '/bookmarks/add?error=Title and URL are required');
            exit;
        }

        try {
            $bookmarkModel = new BookmarkModel();
            $bookmarkModel->addBookmark($collectionId, $title, $url, $description, $tags);
            header('Location: /collection/' . $collectionId);
            exit;
        } catch (\Exception $e) {
            // Handle database error
            header('Location: /collections/' . $collectionId . '/bookmarks/add?error=Failed to add bookmark');
            exit;
        }
    }

    public function delete($params)
    {
        $bookmarkId = $params['bookmark_id'] ?? null;
        $collectionId = $params['collection_id'] ?? null;
        
        if (!$bookmarkId || !$collectionId) {
            header('Location: /collections');
            exit;
        }

        try {
            $bookmarkModel = new BookmarkModel();
            $bookmarkModel->deleteBookmark($bookmarkId);
            header('Location: /collection/' . $collectionId);
            exit;
        } catch (\Exception $e) {
            header('Location: /collection/' . $collectionId . '?error=Failed to delete bookmark');
            exit;
        }
    }

    public function edit($params)
    {
        $bookmarkId = $params['bookmark_id'] ?? null;
        $collectionId = $params['collection_id'] ?? null;

        $collectionModel = new CollectionModel();
        $collectionName = $collectionModel->getCollectionNameById($collectionId);

        $bookmarkModel = new BookmarkModel();
        $bookmark = $bookmarkModel->getBookmarkById($bookmarkId);

        $data = [
            'title' => 'Edit Bookmark - BrowserSync',
            'collectionId' => $collectionId,
            'collectionName' => $collectionName,
            'bookmarkId' => $bookmarkId,
            'bookmark' => $bookmark
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/edit.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function update($params)
    {
        $bookmarkId = $params['bookmark_id'] ?? null;
        $collectionId = $params['collection_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $url = $_POST['url'] ?? '';
        $description = $_POST['description'] ?? '';
        $tags = $_POST['tags'] ?? '';

        if (empty($title) || empty($url)) {
            header('Location: /collections/' . $collectionId . '/bookmarks/' . $bookmarkId . '/edit?error=Title and URL are required');
            exit;
        }

        try {
            $bookmarkModel = new BookmarkModel();
            $bookmarkModel->updateBookmark($bookmarkId, $collectionId, $title, $url, $description, $tags);
            header('Location: /collection/' . $collectionId);
            exit;
        } catch (\Exception $e) {
            header('Location: /collections/' . $collectionId . '/bookmarks/' . $bookmarkId . '/edit?error=Failed to update bookmark');
            exit;
        }
    }
}