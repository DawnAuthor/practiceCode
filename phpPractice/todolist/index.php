
<?php

require_once('app/init.php');

$itemsQuery = $db->prepare("
	SELECT itm_id, itm_name, itm_done
	FROM items
	WHERE itm_user_id = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

// foreach($items as $item):
// 	Debug::log($item);
// endforeach;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Php To Do</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div class="list">
			<h1 class="header">To Do.</h1>
			<?php if(!empty($items)): ?>
			<ul class="items">
				<?php foreach($items as $item): ?>
					<li>
						<span class="item<?= $item['itm_done'] ? ' done' : ''?>"><?= $item['itm_name']; ?></span>
						<?php if(!$item['itm_done']): ?>
							<a href="mark.php?as=done&item=<?= $item['itm_id']?>" class="done-button">Mark as done.</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php else: ?>
				<p>You haven't added any items yet.</p>
			<?php endif; ?>


			<form class="item-add" action="add.php" method="post">
				<input type="text" name="itm_name" placeholder="Type a new item here." class="input" autocomplete="off" required>
				<input type="submit" value="Add" class="submit">
			</form>
		</div>
	</body>
</html>