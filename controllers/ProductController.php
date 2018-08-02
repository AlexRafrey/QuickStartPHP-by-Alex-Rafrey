<?
class ProductController{
	//показать 1 товар
	public function actionView(){
		//подключаем шапку, контент, футер
		include ROOT.'/views/layouts/header.php'; 
			require_once(ROOT.'/views/product/productDetails.php');
		include ROOT.'/views/layouts/footer.php';

		return true;
	}
	public function actionIndex(){
		include ROOT.'/views/layouts/header.php';
			require_once(ROOT.'/views/product/index.php');
		include ROOT.'/views/layouts/footer.php';

		return true;
	}
}