<?php
session_start();
ob_start();

include_once "config.database.php";
include_once "module.php";

if(isset($_SESSION['login']) && isset($_SESSION['id'])) {
  include_once "template.admin.php";
} else {
  include_once "template.login.php";
}

?>
