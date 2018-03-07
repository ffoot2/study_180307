<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if ($userId == ""){
  echo $userId;die();
  send_error_page();
}

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];

if (!is_numeric($id)) {
  echo $userId;die();
  send_error_page();
}

if (is_null($title) || $title = ""
    || mb_strlen($title) > 40) {
  send_error_page();
}

if (is_null($body) || $body = ""
    || mb_strlen($body) > 40) {
  send_error_page();
}

$article = [];
$article['id'] = $_POST['id'];
$article['title'] = $_POST['title'];
$article['body'] = $_POST['body'];
$article['date'] = date("Y-m-d G:i:s");
$article['author'] = $_SESSION['userId'];

update_article($article);

header("location:index.php");

 ?>
