<?

class News{
	public static function getNewsItemById($id){
		$db = Db::GetConnection();
		//запрашиваем айди из бд, который передает контроллер
		$id = intval($id);
		if ($id) {
			//отдаём список новостей($newList) по запросы http://mvcshop/news/
			$result = $db->prepare("SELECT * FROM news WHERE id = ?");
			$result->execute([$id]);
			$newItem = $result->fetch();
			return $newItem;
		}
	}

	public static function getNewsList(){
		$db = Db::GetConnection();
		//отдаём список новостей($newList) по запросы http://mvcshop/news/
		$newList = array();
		$result = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 5");
		$count = 0;
		while($row = $result->fetch()){
			$newList[$count]['id'] = $row['id'];
			$newList[$count]['title'] = $row['title'];
			$newList[$count]['date'] = $row['date'];
			$newList[$count]['short_content'] = $row['short_content'];
			$count++;
		}
		return $newList;
	}
}
