# regard-showcase
Тестовые задания для собеседования в Regard

## Разработка
Соберите Docker-контейнер для локальной разработки

```shell
docker compose build --progress=plain  --build-arg USER_ID=$(id -u ${USER}) --build-arg GROUP_ID=$(id -g ${USER})
```

Запустите стек контейнеров с помощью `compose`

```
docker compose up -d
```

Проект доступен по адресу http://localhost

## Deploy

В проекте настроены github actions на валидацию синтаксиса и автозапуск тестов.

Код вливается в `main` через pull-request'ы после успешного выполнения всех шагов CI

## Задачи

### №1 Развернуть список

Напишите функцию, которая развернёт список.
Последний элемент должен стать первым, а первый - последним. 
$c→next должен содержать $b и так далее...
 
```php
class test {
  public $next;
}

$a = new test();
$b = new test();
$c = new test();
$a->next = $b;
$b->next = $c;
$c->next = null;
```

Пример результата:

```
function reverse($a) {
  // какой-то код
}

$ob1 = reverse($a);
var_dump($ob1);
```

#### №2 Вывод заказов

Даны две модели Order и Manager

```php
class Order extends Model
{
    public function manager()
    {
        return $this->hasOne('App\Manager');
    }
}

class Manager extends Model
{
}
```

Каждый Order имеет manager_id. Manager имеет id, firstName, lastName
Необходимо вывести 50 заказов (Order) + fullName менеджера с минимальным кол-вом запросов к бд.
Дополните класс Order.
Реализовать нужно без использование join.

#### №3 Посылки

Даны веса посылок $boxes и вес, который может увезти курьер $weight.
Курьер должен возить по 2 посылки, которые вместе по весу будут строго равны $weight.
Необходимо найти максимальное количество рейсов, которые курьер сможет сделать с учетом условий.

```php
// первые входные данные
$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$weight = 6;
// вторые входные данные
$boxes = [2,4,3,6,1];
$weight = 5;

public function getResult(array $boxes, int $weight): int
{
  // какой-то код
}
```
