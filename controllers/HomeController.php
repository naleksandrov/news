<?php

namespace controllers;

use components\MasterController;
use components\Pagination;
use models\Languages;
use models\News;

include_once 'models/News.php';
include_once 'components/MasterController.php';

class HomeController extends MasterController {

	public function __construct() {
		parent::__construct();
	}

	public function actionIndex($pageNum = 1) {
		$news = new News();
		$newsList = $news->getNews($pageNum, 5);
		$newsCount = $news->getNewsCount();
		$activePage = !$pageNum ? 1 : $pageNum;
		$langList = Languages::$langList;

		include_once 'components/Pagination.php';
		$newPagination = new Pagination(9, $activePage, 5, '/' . ROOT_PATH . 'home/index/');
		$pagination = $newPagination->pagination;

		$pageTitle = 'Master Controller Title';
		$contentName = 'views/master/home.php';
		include_once 'views/layouts/default.php';
	}
}