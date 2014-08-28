<?php

require_once('app/init.php');

if(isset($_POST['itm_name'])){
	$itm_name = trim($_POST['itm_name']);

	if(!empty($itm_name)){
		$addedQuery = $db->prepare("
			INSERT INTO items (itm_name, itm_user_id, itm_done, itm_created)
			VALUES (:itm_name, :itm_user_id, 0, NOW())
		");

		$addedQuery->execute([
			'itm_name' => $itm_name,
			'itm_user_id' => $_SESSION['user_id']
		]);
	}
}

header('Location: index.php');