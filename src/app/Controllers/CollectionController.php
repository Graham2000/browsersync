<?php

namespace App\Controllers;

use Core\Database;

class CollectionController
{
    public function collections()
    {
        require_once __DIR__ . '/../Views/collections/collections.php';
    }

    public function add()
    {
        require_once __DIR__ . '/../Views/collections/add.php';
    }

    public function collection($params = [])
    {
        $id = $params['id'] ?? null;
        require_once __DIR__ . '/../Views/collections/collection.php';
    }
}