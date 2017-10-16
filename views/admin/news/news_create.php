<div class="news-edit">
	<form method="POST">
		<div class="row">
			<div class="col-sm-6 form-group">
				<label class="form-label" for="news-source">Източник</label>
				<input type="text" class="form-control" id="news-source" name="source" />
			</div>
			<div class="col-sm-6 form-group">
				<label class="form-label" for="news-date">Дата</label>
				<input type="text" class="form-control" id="news-date" name="date" />
			</div>
		</div>
		<?php foreach($langList as $key=>$news): ?>
			<fieldset>
				<legend><?= $news['language']; ?></legend>
					<div class="form-group">
						<label class="form-label" for="news-title<?= $key; ?>">Заглавие</label>
						<input type="text" class="form-control" id="news-title<?= $key; ?>" name="title[]" />
					</div>
					<div class="form-group">
						<label class="form-label" for="news-short-description<?= $key; ?>">Кратко описание</label>
						<textarea class="form-control" id="news-short-description<?= $key; ?>" name="short-description[]"></textarea>
					</div>
					<div class="form-group">
						<label class="form-label" for="news-description<?= $key; ?>">Дълго описание</label>
						<textarea class="form-control" id="news-description<?= $key; ?>" name="description[]"></textarea>
					</div>

			</fieldset>
		<?php endforeach; ?>
		<div class="text-center">
			<button type="submit" class="btn btn-primary form-submit">Запазване</button>
		</div>
	</form>
</div>