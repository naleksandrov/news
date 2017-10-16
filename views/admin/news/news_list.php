<?php

?>
<div class="news-list">
	<div class="form-group clearfix">
		<a href="/<?= ROOT_PATH; ?>admin/news/create" class="btn btn-primary">Добавяне</a>
		<div class="pull-right">
			<select class="form-control change-lang">
				<?php foreach($langList as $lang): ?>
					<option data-lang-name="<?= $lang['language']; ?>"
					        data-lang-id="<?= $lang['id']; ?>"
							<?= $lang['id'] === $lanId ? 'selected' : ''; ?>
					>
						<?= $lang['language']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<?php if ($newsCount['count'] > 0): ?>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>Новина</th>
					<th>Кратко описание</th>
					<th>Дата</th>
					<th>Действия</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($newsList as $news): ?>
				<tr>
					<td><?= $news['id'] ?></td>
					<td><?= $news['title'] ?></td>
					<td><?= $news['short_description'] ?></td>
					<td><?= $news['date'] ?></td>
					<td>
						<a href="/<?= ROOT_PATH; ?>admin/news/edit/<?= $news['id']; ?>/<?= $activePage; ?>" class="news-update">
							<i class="fa fa-pencil fa-lg"></i>
						</a>
						<a href="javascript:;" class="news-delete" data-id="<?= $news['id']; ?>">
							<i class="fa fa-trash fa-lg"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<nav class="pull-right">
			<?= $pagination ?>
		</nav>
	<?php endif; ?>
</div>

<div class="collapse">
	<div id="dialog" title="Изтриване">
		Сигурни ли сте че искате да изтриете тази новина
	</div>​
</div>
