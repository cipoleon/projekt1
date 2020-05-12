<hr>
<?php 
if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM workers WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$worker = getRecord($query, $params);
	if(empty($worker)) :
		header('Location: index.php');
	else : ?>
	<div class="középrehelyezés">
		<h4><?=$worker['first_name'].' '.$worker['last_name'] ?></h4>
		<h5><?=$worker['email'] ?></h5>
		<p>Nem: <?=$worker['gender'] == 0 ? 'Nő' : ($worker['gender'] == 1 ? 'Férfi' : 'Egyéb') ?> <br>
		Munkakör: <?=$worker['nationality'] ?></p>
	</div>
	<?php endif;
endif;
?>