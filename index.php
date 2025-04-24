<?php
ob_start();
include "app/model/database.php";
include "app/controller/main.php";

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/WEB_2/Lining');
exit;
?>