<hr>
<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM project WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, project_name, developer, graphical1, graphical2, FROM project ORDER BY project_name ASC";
	require_once DATABASE_CONTROLLER;
    $projects = getList($query);
?>
    <?php if(count($projects) <= 0) : ?>
		<h1 class="középrehelyezés">Nem találtam projektet az adatbázisban.</h1>
	<?php else : ?>
<form method="post">
			<div class="form-row">
					<div class="form-group col-md-12">
						<input type="text" class="form-control" id="searchinput" name="search" placeholder="Keresés">
					</div>
			</div>

	<button type="submit" class="btn btn-primary" name="search">Keresés</button>
	<hr>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Projekt</th>
					<th scope="col">Fejlesztő</th>
					<th scope="col">Grafikus1</th>
					<th scope="col">Grafikus2</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
                <?php foreach ($projects as $p) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=worker&w=<?=$p['id'] ?>"><?=$p['project_name'] ?></a></td>
						<td><?=$p['developer'] ?></td>
						<td><?=$p['graphical1'] ?></td>
						<td><?=$p['graphical2'] ?></td>
						<td><a href="?P=edit_worker&w=<?=$p['id'] ?>">Szerkesztés</a></td>
						<td><a href="?P=list_worker&d=<?=$p['id'] ?>">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>