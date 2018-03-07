<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$id = $_GET['id'];

if (!is_numeric($id)) {
  send_error_page();
}

delete_article($id - 1);

header("location:index.php");

 ?>
