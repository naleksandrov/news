<div class="row">
	<div class="col-sm-6 form-group">
		<label class="form-label" for="news-source">Източник</label>
		<input type="text" class="form-control" id="news-source" name="source"
		       value="<?= isset($newsList[0]['source']) ? $newsList[0]['source'] : ''; ?>"
		/>
	</div>
	<div class="col-sm-6 form-group">
		<label class="form-label" for="news-date">Дата</label>
		<input type="text" class="form-control datepicker" id="news-date" name="date"
		       value="<?= isset($newsList[0]['date']) ? $newsList[0]['date'] : ''; ?>"
		/>
	</div>
</div>