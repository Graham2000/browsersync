<?php

namespace App\Controllers;

use Core\Database;

class BookmarkController
{
    public function bookmarks()
    {
        $data = [
            'title' => 'Bookmarks - BrowserSync'
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/index.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }

    public function add()
    {
        $data = [
            'title' => 'Add Bookmark - BrowserSync'
        ];
        
        $view = __DIR__ . '/../Views/bookmarks/add.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }
}