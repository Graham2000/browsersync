<?php

namespace App\Controllers;

use Core\Database;

class CollectionController
{
    public function collections()
    {
        $data = [
            'title' => 'Collections - BrowserSync'
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
        $id = $params['id'] ?? null;
        $data = [
            'title' => 'Collection ' . $id . ' - BrowserSync',
            'id' => $id
        ];
        
        $view = __DIR__ . '/../Views/collections/collection.php';
        include __DIR__ . '/../Views/layouts/app.php';
    }
}