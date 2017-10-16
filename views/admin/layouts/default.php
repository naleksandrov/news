<?php
	use models\User;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="/<?= ROOT_PATH; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/<?= ROOT_PATH; ?>/public/css/jquery-ui.min">
	<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/<?= ROOT_PATH; ?>public/css/admin.css">
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/tinymce/tinymce.min.js"></script>
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
					<a class="navbar-brand" href="/<?= ROOT_PATH ?>admin">Admin</a>
				</div>
				<?php if (User::$isAdmin): ?>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="/<?= ROOT_PATH ?>admin/news/add">news</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= User::$loggedUserName; ?><span class="caret"></span></a>
								<ul class="dropdown-menu languages">
									<li><a href="/<?= ROOT_PATH ?>admin/user/logout">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				<?php endif;?>
			</div>
		</nav>
	</header>

	<div class="main-container">
		<div class="container">
			<?php include_once $contentName; ?>
		</div>
	</div>
	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea',
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table contextmenu paste code'
			],
			setup: function (editor) {
				editor.on('change', function () {
					editor.save();
					if ($('.news-edit').length !== 0) {
						$('#' + editor.id).parents('form').find('button').show();
					}
				});
			},
			toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
		});
	</script>
	<script type="text/javascript" src="/<?= ROOT_PATH; ?>public/js/admin-scripts.js"></script>
</body>
</html>