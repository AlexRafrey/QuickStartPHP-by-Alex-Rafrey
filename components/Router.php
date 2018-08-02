<?
class Router {
	private $routes;
	public function __construct(){
		$routesPath = ROOT.'/config/routes.php'; 
		$this->routes = include($routesPath); //выводим роутеру в перемнную (через routes.php -> return array)
	}
	//вычиляет запрос после домена как rafrey.ru/zapros/news  -> zapros/news
	private function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	public function run(){
		$uri = $this->getURI();
		foreach ($this->routes as $uriPattern => $path) {
			//Находим что запрос юзера (ключ) - такой же как наш запрос
			if(preg_match("#$uriPattern$#", $uri)){
				//ищем одну новость: (ключ) - регулярка, ($path) - маски и на что меняем, ($uri) - адрес в браузере  
				$outRouter = preg_replace("#$uriPattern#", $path, $uri); 
				//разбиваем на массив нашу строку выше
				$segments = explode('/', $outRouter);
				//извлекаем 2 эллемента в массиве - news/view - что прпоисано в значение routes.php
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'Action'.ucfirst(array_shift($segments)); 
				//подключаем файл контроллера который - controllerName и проверяем его существования
				$controllerFile = ROOT. '/controllers/'. $controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				$controllerObject = new $controllerName;
				//вызываем метод $actionName у класса $controllerObject и передаем параметры =  $segments
				$result = call_user_func_array(array($controllerObject, $actionName), $segments);
				//если экшен вызван и отдал  true - то обрываем все, метод и контроллер найден
				if ($result != null) {
					break;
				}

			}
		}
	}
}
