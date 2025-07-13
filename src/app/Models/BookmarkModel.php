<?php

namespace App\Models;

use Core\Database;

class BookmarkModel
{
    public function getBookmarks($collectionId)
    {
        $db = new Database();
        $stmt = $db->query("SELECT bookmarks.id, bookmarks.title, bookmarks.description, 
        bookmarks.url, bookmarks.created_at, bookmarks.updated_at,
        GROUP_CONCAT(tags.name) as tags
        FROM bookmarks 
        LEFT JOIN bookmark_tags ON bookmarks.id = bookmark_tags.bookmark_id 
        LEFT JOIN tags ON bookmark_tags.tag_id = tags.id 
        WHERE bookmarks.collection_id = ?
        GROUP BY bookmarks.id", [$collectionId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}