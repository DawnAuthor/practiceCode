<?php
require_once('utilities/Debug.class.php');
session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todoapp;host=localhost', 'root', '');

//HANDLE IN SOME OTHER WAY

if(!isset($_SESSION['user_id'])){
	die('You are not signed in');
}