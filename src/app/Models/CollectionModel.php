<?php

namespace App\Models;

use Core\Database;
use PDO;

class CollectionModel
{
    public function getCollections()
    {
        $db = new Database();
        $collections = $db->query("SELECT collections.id, collections.title, COUNT(bookmarks.id) as count 
        FROM collections LEFT JOIN bookmarks ON collections.id = bookmarks.collection_id 
        GROUP BY collections.id");
        return $collections->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCollectionNameById($id)
    {
        $db = new Database();
        $stmt = $db->query("SELECT title FROM collections WHERE id = ?", [$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['title'] : 'Unknown Collection';
    }

    public function addCollection($title)
    {
        $db = new Database();
        $stmt = $db->query("INSERT INTO collections (title, created_at, updated_at) VALUES (?, NOW(), NOW())", [$title]);
        return $db->getConnection()->lastInsertId();
    }
}