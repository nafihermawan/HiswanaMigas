<?php

function getPage() {
	return isset($_GET['halaman'])?$_GET['halaman']:'home';
}

function getPageSub() {
	return isset($_GET['aksi'])?$_GET['aksi']:'';
}

function getDo() {
	return isset($_GET['do'])?$_GET['do']:'';
}

function getID() {
	return isset($_GET['id'])?$_GET['id']:0;
}

?>
