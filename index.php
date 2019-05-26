<?php
include "Article.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = $_POST['title'] ?? '';
$text = $_POST['text'] ?? '';

$article = new article();

if (!empty(($title) && !empty($text))) {
    $article->save($title, $text);
}

print $_POST;



