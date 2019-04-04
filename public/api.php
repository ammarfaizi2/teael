<?php

session_start();

if (isset($_SESSION["login"], $_SESSION["path"], $_SESSION["url_path"])) {
	chdir(__DIR__."/../php");
	require __DIR__."/../php/connector.minimal.php";
	exit;
}

http_response_code(403);
