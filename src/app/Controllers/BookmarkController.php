<?php

namespace App\Controllers;

use Core\Database;

class BookmarkController
{
    public function bookmarks()
    {
        require_once __DIR__ . '/../Views/bookmarks/bookmarks.php';
    }

    public function add()
    {
        require_once __DIR__ . '/../Views/bookmarks/add.php';
    }
}