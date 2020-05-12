<hr>
<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM material WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, owner_name, code FROM material ORDER BY owner_name ASC";
	require_once DATABASE_CONTROLLER;
    $material = getList($query);
?>
    <?php if(count($material) <= 0) : ?>
		<h1 class="középrehelyezés">Nem találtam anyagot az adatbázisban.</h1>
	<?php else : ?>
		<hr>
<form method="post">
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
					<th scope="col">Tulajdonos neve</th>
					<th scope="col">Kód</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
                <?php foreach ($material as $w) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=worker&w=<?=$w['id'] ?>"><?=$w['owner_name'] ?></a></td>
						<td><?=$w['code'] ?></td>
						<td><a href="?P=edit_worker&w=<?=$w['id'] ?>">Szerkesztés</a></td>
						<td><a href="?P=list_worker&d=<?=$w['id'] ?>">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>