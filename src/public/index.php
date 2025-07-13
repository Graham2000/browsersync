<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Controllers\HomeController;
use App\Controllers\BookmarkController;
use App\Controllers\CollectionController;
use Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/collections', [CollectionController::class, 'collections']);
$router->get('/collections/add', [CollectionController::class, 'add']);
$router->get('/collection/{id}', [CollectionController::class, 'collection']);
$router->get('/collections/{collection_id}/bookmarks/add', [BookmarkController::class, 'add']);

$router->post('/collections', [CollectionController::class, 'add']);

$result = $router->dispatch($_SERVER['REQUEST_URI']);

?> 