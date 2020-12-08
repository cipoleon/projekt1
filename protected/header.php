<html lang="hu">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- 	<meta name="description" content=""> -->
	<meta name="author" content="Aux Ciprián">

	<title>Aux Ciprián</title>

	<!-- Bootstrap core CSS -->
	<link href="./public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
	<link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="./public/style.css" rel="stylesheet">
</head>

<body id="page-top">

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
	<a class="navbar-brand js-scroll-trigger" href="#page-top">
		<span class="d-block d-lg-none">Aux Ciprián</span>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php">Kezdőoldal</a>
			</li>
            <?php if(!IsUserLoggedIn()) : ?>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=login">Belépés</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=register">Regisztráció</a>
			</li>
            <?php else : ?>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=list_worker">Dolgozók</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=list_project">Projektek</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=list_material">Anyagok</a>
			</li>
            <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=add_worker">Dolgozó hozzáadás</a>
			</li>
            <?php endif; ?>
            <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="index.php?P=logout">Kilépés</a>
			</li>
            <?php endif; ?>
		</ul>
	</div>
</nav>
	<content class="container-fluid p-0">

		<section class="resume-section p-3 p-lg-5 d-flex align-items-center">
	<div class="w-100">
		<h1 class="mb-0">Aux
			<span class="text-primary">Ciprián</span>
		</h1>
		<div class="subheading mb-4">
			<a href="mailto:cipoka1@gmail.com">cipoka1@gmail.com</a>
			<br>Tanuló
		</div>
		<p style="margin: 0;" class="lead">Az Eszterházy Károly Egyetem egri campusán vagyok <i>Programtervező Informatikus fosz.</i> szakos hallgató. <br></p>
	</div>
