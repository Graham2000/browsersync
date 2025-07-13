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

    public function addBookmark($collectionId, $title, $url, $description, $tags)
    {
        try {
            $db = new Database();
            $db->beginTransaction();

            $db->query("INSERT INTO bookmarks (collection_id, title, url, description) VALUES (?, ?, ?, ?)", [$collectionId, $title, $url, $description]);

            $bookmarkId = $db->lastInsertId();

            $tagsArray = explode(',', $tags);
            foreach ($tagsArray as $tag) {
                $tagId = $db->query("SELECT id FROM tags WHERE name = ?", [$tag])->fetchColumn();
                if (!$tagId) {
                    $db->query("INSERT INTO tags (name) VALUES (?)", [$tag]);
                    $tagId = $db->lastInsertId();
                }
                $db->query("INSERT INTO bookmark_tags (bookmark_id, tag_id) VALUES (?, ?)", [$bookmarkId, $tagId]);
            }

            $db->commit();
        } catch (\Exception $e) {
            $db->rollBack();
            throw $e;
        }
    }

    public function deleteBookmark($bookmarkId)
    {
        $db = new Database();
        $pdo = $db->getConnection();
        
        try {
            $pdo->beginTransaction();
        
            $db->query("DELETE FROM bookmark_tags WHERE bookmark_id = ?", [$bookmarkId]);
            
            $db->query("DELETE FROM bookmarks WHERE id = ?", [$bookmarkId]);
            
            $pdo->commit();
            return true;
        } catch (\Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }
}