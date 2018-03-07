<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {

}

$title = $_POST['title'];
$body = $_POST['body'];

if (is_null($title) || $title == ''
    || mb_strlen($title, DEFAULT_ENCODE) > 40) {
  send_error_page();
}

if (is_null($body) || $body == ''
    || mb_strlen($body, DEFAULT_ENCODE) > 40) {
  send_error_page();
}

$article = [];
$article['id'] = get_new_article_id();
$article['title'] = $_POST['title'];
$article['body'] = $_POST['body'];
$article['date'] = date("Y-m-d G:i:s");
$article['author'] = $_SESSION['userId'];

save_article($article);

header("location:index.php");
