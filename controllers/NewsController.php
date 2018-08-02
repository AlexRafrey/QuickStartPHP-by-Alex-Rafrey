<?
//подключаем модель корнень_сайта(ROOT)/models/name.php
include_once ROOT. '/models/News.php';
class NewsController{
	public function actionIndex(){
		$newsList = array();
		$newsList = News::getNewsList();
		require_once(ROOT.'/views/news/index.php');
		return true;
	}
	public function actionView($category, $id){
		if ($id) {
			//вызываем модель и передаем ей ид, она вернет в эту же перменную статью
			$newsItem = News::getNewsItemById($id);
			// echo '<pre>';
			// 	print_r($newsItem);
			// echo '</pre>';
		}
		return true;
	}
}