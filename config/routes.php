<?
// возвращаем массив руотеров при обращении
return array(
	// запрос в адресной строке GET => название котроллера / название экшена
	// ключ будет использован как регулярка (делаем 2 маски) в Router.php - $uriPattern
	// 'news/view/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', 
	// 'news' => 'news/index', //запросу news  соответсвует строка news/index - это контроллер и экшен
	'products' => 'product/index',  
	'products/([0-9]+)' => 'product/view/$1', // в контроллере - ProductController / экшен - actionList,
);