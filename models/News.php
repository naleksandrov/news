<?php

namespace models;
use components\MasterModel;
include_once 'components/MasterModel.php';

class News extends MasterModel {

	public function getNews($pageNum, $limit = 10) {
		$pageNum = !$pageNum ? 1 : $pageNum;
		$start = ($pageNum - 1) * $limit;

		$newsArr = $this->find(
	'SELECT news.id, nt.title, nt.short_description, news.source, news.date
          FROM news LEFT JOIN news_translations as nt ON news.id = nt.news_id 
          WHERE nt.language_id = '. $this->languageId .' ORDER BY news.id DESC LIMIT ' . $start . ',' . $limit
		);
		return $newsArr;
	}

	public function getNewsCount() {
		$newsCount = $this->find(
	'SELECT COUNT(*) as count FROM news LEFT JOIN news_translations as nt ON news.id = nt.news_id
          WHERE nt.language_id = ' . $this->languageId, true
		);
		return $newsCount;
	}

	public function newsDetails($id) {
		$newsArr = $this->find(
	'SELECT * FROM news LEFT JOIN news_translations ON news.id = news_translations.news_id 
		  WHERE news_translations.language_id = '. $this->languageId .' AND news.id = ' . $id
		);
		return $newsArr;
	}

	public function editNews($id) {
		$newsArr = $this->find(
	'SELECT * FROM news LEFT JOIN news_translations ON news.id = news_translations.news_id WHERE news.id = ' . $id
		);
		return $newsArr;
	}

	public function createNews($numLang) {
		if (!empty($_POST)) {
			$date = $_POST['date'];
			$source = $_POST['source'];
			$lastId = $this->insertAndReturnLastId(
				'INSERT INTO news (date, source) VALUES ("'. $date .'", "' . $source .'")'
			);
			$queriesArr = array();

			for ($i = 0; $i < $numLang; $i++) {
				$title = $_POST['title'][$i];
				$shortDescription = $_POST['short-description'][$i];
				$description = $_POST['description'][$i];
				$queriesArr[] =
					'INSERT INTO news_translations (title, short_description, description, language_id, news_id) 
					VALUES ("'. $title .'", "' . $shortDescription .'", "'. $description .'", '. ($i+1) .', '. $lastId .')
					';
			}
			$this->insertMultiple($queriesArr);
			header("Location: /" . ROOT_PATH . 'admin/news');
			exit();
		}
	}

	public function updateNews() {
		$query = '';

		if (isset($_POST['news-id'])) {
			$newsId = $_POST['news-id'];
			$source = $_POST['source'];
			$date = $_POST['date'];
			$query = 'UPDATE news SET date= "' . $date . '", source= "' . $source . '" WHERE id=' . $newsId;
		} else {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$shortDescription = $_POST['short-description'];
			$description = $_POST['description'];
			$query =
				'UPDATE news_translations 
				SET title= "' . $title . '", short_description= "' . $shortDescription . '", description= "' . $description . '" 
				WHERE id=' . $id;
		}

		$this->executePrepare($query);
	}

	public function deleteNews($id) {
		if (isset($id)) {
			$this->execute('DELETE FROM news WHERE id=' . $id);
			$this->execute('DELETE FROM news_translations WHERE news_id=' . $id);
		}
	}

}