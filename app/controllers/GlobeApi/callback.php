<?php
session_start();

if (isset($_GET['code'])) {
	$_SESSION['code'] = $_GET['code'];
	//header("Location: index.php");
} else {
	//header("Location: index.php");
}