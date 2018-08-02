<?
class Db{
	public static function GetConnection(){
		$db = new PDO("mysql:host=localhost; dbname=mvc_shop; charset = utf8", 'root',  '');
		return $db;
	}
}