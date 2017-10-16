<h1><?= Helper::$translation['news'] ?></h1>
<?php if ($newsCount['count'] > 0): ?>
	<ul class="news">
		<?php foreach($newsList as $news): ?>
			<li>
				<a href="<?= '/' . ROOT_PATH . 'news/index/' . $news['id'] ?>" class="well show">
					<h2><?= $news['title'] ?></h2>
					<div><?= $news['short_description'] ?></div>
					<div><?= $news['source'] ?></div>
					<div><?= $news['date'] ?></div>
				</a>
			</li>
		<?php endforeach;  ?>
	</ul>
	<nav class="pull-right">
		<?= $pagination ?>
	</nav>
<?php endif; ?>