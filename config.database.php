<?php

$_SETUP['DATABASE']['username']="root";

$_SETUP['DATABASE']['password']="";

$_SETUP['DATABASE']['porthost']="localhost";

$_SETUP['DATABASE']['database']="hiswana_migas";

try {
    $koneksi = new PDO("mysql:host={$_SETUP['DATABASE']['porthost']};dbname={$_SETUP['DATABASE']['database']}", $_SETUP['DATABASE']['username'], $_SETUP['DATABASE']['password']);
   /*** Menutup koneksi ***/
    $koneksi=null;
} catch(PDOException $e) {
    die($e->getMessage());
}

/*

Constanta configuration database

Not need to change

*/

if(!defined("DATABASE_USERNAME"))		define("DATABASE_USERNAME",$_SETUP['DATABASE']['username']);

if(!defined("DATABASE_PASSWORD"))		define("DATABASE_PASSWORD",$_SETUP['DATABASE']['password']);

if(!defined("DATABASE_PORTHOST"))		define("DATABASE_PORTHOST",$_SETUP['DATABASE']['porthost']);

if(!defined("DATABASE_DATABASE"))		define("DATABASE_DATABASE",$_SETUP['DATABASE']['database']);


// reset for variable configuration
//
//
unset($_SETUP['DATABASE']);

function koneksi() {
    $koneksi = new PDO("mysql:host=".DATABASE_PORTHOST.";dbname=".DATABASE_DATABASE, DATABASE_USERNAME, DATABASE_PASSWORD);
	return $koneksi;
}

?>
