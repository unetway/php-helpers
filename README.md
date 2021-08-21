# PHP Helpers

Пакет с полезными хелперами PHP


## Установка

````
$ composer require unetway/php-helpers
````

## Использование



````
use Unetway\PhpHelpers\Request;
use Unetway\PhpHelpers\Session;
use Unetway\PhpHelpers\Log;


### Запросы

Request::get($key);
Request::getBody();
Request::json(array $params);
Request::location($url);
Request::throttle(int $limit_request = 1, int $time_request = 10);


### Сессии

$session = Session::get('name');

Session::put('name', 'value');

Session::destroy('name');
Session::destroy(['name1', 'name2', 'name3']);

Session::increment('name', $prefix = false);
Session::decrement('name', $prefix = false);


### Логирование

$data = 'данные';
$path = '/var/www/site/';
Log::save($data, $path);

````

