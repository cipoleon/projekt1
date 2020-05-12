<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM workers WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM workers ORDER BY first_name ASC";
	require_once DATABASE_CONTROLLER;
	$workers = getList($query);
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST['search'])) {
	$search = $_GET['search'];
	$query = "SELECT * FROM workers WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%' OR nationality LIKE '%$search%'";
	require_once DATABASE_CONTROLLER;
	$workers = getList($query);
}

?>
	<?php if(count($workers) <= 0) : ?>
		<h1 class="középrehelyezés">Nem találtam dolgozót az adatbázisban.</h1>
	<?php else : ?>
		<hr>
<form method="get">
	<div class="form-row">
		<div class="form-group col-md-12">
			<input type="text" class="form-control" id="searchinput" name="search" placeholder="Keresés">
		</div>
	</div>

<button type="submit" class="btn btn-primary" name="search">Keresés</button>
	<hr>
</form>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Keresztnév</th>
					<th scope="col">Vezetéknév</th>
					<th scope="col">Email</th>
					<th scope="col">Nem</th>
					<th scope="col">Munkakör</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($workers as $w) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=worker&w=<?=$w['id'] ?>"><?=$w['first_name'] ?></a></td>
						<td><?=$w['last_name'] ?></td>
						<td><?=$w['email'] ?></td>
						<td><?=$w['gender'] == 0 ? 'Nő' : ($w['gender'] == 1 ? 'Férfi' : 'Egyéb') ?></td>
						<td><?=$w['nationality'] ?></td>
						<td><a href="?P=edit_worker&w=<?=$w['id'] ?>">Szerkesztés</a></td>
						<td><a href="?P=list_worker&d=<?=$w['id'] ?>">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>
