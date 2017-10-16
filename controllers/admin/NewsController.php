<?php

namespace admin\controllers;
use models\News;
use models\Languages;
use components\Pagination;

include_once 'models/News.php';
include_once 'models/Languages.php';
include_once 'controllers/admin/AdminController.php';

class NewsController extends AdminController {

	public function actionIndex($pageNum = 1) {
		$news = new News();
		$newsList = $news->getNews($pageNum, 10);
		$newsCount = $news->getNewsCount();
		$langList = Languages::$langList;
		$lanId = isset($_SESSION['language_id']) ? $_SESSION['language_id'] : 1;
		$activePage = !$pageNum ? 1 : $pageNum;
		/*include_once 'components/Pagination.php';
		$newPagination = new Pagination($newsCount, $activePage, 10, '/' . ROOT_PATH . 'admin/news/index/');
		$pagination = $newPagination->pagination;*/

		$pageTitle = 'News List';
		$contentName = 'views/admin/news/news_list.php';
		include_once 'views/admin/layouts/default.php';
	}

	public function actionEdit($param) {
		$paramArr = explode('/', $param);
		$news = new News();
		$newsList = $news->editNews($paramArr[0]);
		$langList = Languages::$langList;
		$prevPage = empty($paramArr[1]) ? 1 : $paramArr[1];
		$isEdit = true;

		$pageTitle = 'Edit News';
		$contentName = 'views/admin/news/news_edit.php';
		include_once 'views/admin/layouts/default.php';
	}

	public function actionCreate() {
		$news = new News();
		$isEdit = false;
		$langList = Languages::$langList;
		$news->createNews(count($langList));

		$pageTitle = 'Create News';
		$contentName = 'views/admin/news/news_edit.php';
		include_once 'views/admin/layouts/default.php';
	}

	public function actionUpdate() {
		$returnArr = ['success' => false];

		$news = new News();
		$news->updateNews();

		$returnArr['success'] = true;

		echo json_encode($returnArr);
	}

	public function actionDelete($id) {
		$returnArr = ['success' => false];

		$news = new News();
		$news->deleteNews($id);

		$returnArr['success'] = true;

		echo json_encode($returnArr);
	}

}