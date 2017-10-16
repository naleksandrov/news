<?php
	$nameArr = $isEdit ? '' : '[]';
?>
<div class="<?= $isEdit ? 'news-edit' : ''; ?>">
	<?php if ($isEdit): ?>
		<div class="alert alert-success collapse">
			<strong>Успешно</strong> актуализирахте данните!
		</div>
		<form method="POST">
			<input type="hidden" name="news-id" value="<?= isset($newsList[0]['news_id']) ? $newsList[0]['news_id'] : ''; ?>" />
				<?php include_once 'news_source.php'; ?>
			<div class="text-center">
				<button type="button" class="btn btn-primary form-submit">Обновяване</button>
			</div>
		</form>
	<?php else: ?>
	<form method="POST">
		<?php include_once 'news_source.php'; ?>
	<?php endif; ?>
	<?php foreach($langList as $key=>$news): ?>
		<fieldset>
			<legend>Език <?= $news['language']; ?></legend>
		<?php if ($isEdit): ?>
			<form method="POST">
				<input type="hidden" name="id" value="<?= isset($newsList[$key]['id']) ? $newsList[$key]['id'] : ''; ?>" />
		<?php endif; ?>
				<div class="form-group">
					<label class="form-label" for="news-title<?= $key; ?>">Заглавие</label>
					<input type="text" class="form-control" id="news-title<?= $key; ?>" name="title<?= $nameArr; ?>"
					       value="<?= isset($newsList[$key]['title']) ? $newsList[$key]['title'] : ''; ?>"
					/>
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<label class="form-label" for="news-short-description<?= $key; ?>">Кратко описание</label>
						<textarea class="form-control" id="news-short-description<?= $key; ?>"
						          name="short-description<?= $nameArr; ?>"><?= isset($newsList[$key]['short_description'])
								? $newsList[$key]['short_description'] : ''; ?></textarea>
					</div>
					<div class="col-md-6 form-group">
						<label class="form-label" for="news-description<?= $key; ?>">Дълго описание</label>
						<textarea class="form-control" id="news-description<?= $key; ?>"
						          name="description<?= $nameArr; ?>"><?= isset($newsList[$key]['description'])
								? $newsList[$key]['description'] : ''; ?></textarea>
					</div>
				</div>
		<?php if ($isEdit): ?>
				<div class="text-center">
					<button type="button" class="btn btn-primary form-submit">Обновяване</button>
				</div>
			</form>
		<?php endif; ?>
		</fieldset>
	<?php endforeach; ?>
	<?php if ($isEdit): ?>
		<a href="/<?= ROOT_PATH; ?>admin/news/list/<?= $prevPage; ?>" class="btn btn-primary">Назад</a>
	<?php else: ?>
		<div class="text-center">
			<button type="submit" class="btn btn-primary form-submit">Запазване</button>
		</div>
	</form>
	<?php endif; ?>
</div>