<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="/<?= ROOT_PATH; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/<?= ROOT_PATH; ?>public/css/style.css">
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/<?= ROOT_PATH; ?>"><?= Helper::$translation['news'] ?></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/<?= ROOT_PATH; ?>"><?= Helper::$translation['home'] ?></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Helper::$translation['lang'] ?><span class="caret"></span></a>
							<ul class="dropdown-menu languages">
								<?php foreach($langList as $lang): ?>
									<li>
										<a href="javascript:;"
									       class="<?= $lang['id'] === $_SESSION['language_id'] ? 'active' : ''; ?>"
									       data-lang-id="<?= $lang['id']; ?>"
									       data-lang-name="<?= $lang['language']; ?>"><?= $lang['language']; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<div class="main-container">
		<div class="container">
			<?php include_once $contentName; ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<span class="text-muted">Place sticky footer content here.</span>
		</div>
	</footer>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/scripts.js"></script>
</body>
</html>