<?php
ob_start();
// include "app/controller/main.php";

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/Git/app/controller/main.php');
exit;
?>