<?php


require_once('app/init.php');


if(isset($_GET['as'], $_GET['item'])){
	$as = $_GET['as'];
	$item = $_GET['item'];

	switch($as){
		case 'done':
			$doneQuery = $db->prepare("
				UPDATE items
				SET itm_done = 1
				WHERE itm_id = :item
				AND itm_user_id = :user
			");

		$doneQuery->execute([
			"item" => $item,
			"user" => $_SESSION['user_id']
		]);
		break;
	}
}

header('Location: index.php');

