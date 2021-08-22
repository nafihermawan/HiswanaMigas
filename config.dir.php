<?php

$subdir     = "";

if(!defined("DIR_"))					define("DIR_",$_SERVER['DOCUMENT_ROOT']."/$subdir");
if(!defined("DIR_CONFIG"))				define("DIR_CONFIG",DIR_."config/");
if(!defined("DIR_MODULE"))				define("DIR_MODULE",DIR_."module/");
if(!defined("DIR_PAGE"))				define("DIR_PAGE",DIR_."page/");
if(!defined("DIR_TEMPLATE"))			define("DIR_TEMPLATE",DIR_."template/");

if(!defined("URL_"))					define("URL_","http://".$_SERVER['HTTP_HOST']."/$subdir");
if(!defined("URL_CSS"))					define("URL_CSS",URL_."css/");
if(!defined("URL_JS"))					define("URL_JS",URL_."js/");
if(!defined("URL_IMAGE"))				define("URL_IMAGE",URL_."images/");

?>
