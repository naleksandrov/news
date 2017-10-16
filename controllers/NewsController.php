<?php

namespace controllers;

use components\MasterController;
use models\News;

include_once 'models/News.php';
include_once 'components/MasterController.php';

class NewsController extends MasterController {

	public function __construct() {
		parent::__construct();
	}

	public function actionIndex($id) {
		$news = new News();
		$newsList = $news->newsDetails($id);

		$pageTitle = 'News Details Controller Title';
		$contentName = 'views/detailsPage/news_details.php';
		include_once 'views/layouts/default.php';
	}
}