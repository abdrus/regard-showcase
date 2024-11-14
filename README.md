# regard-showcase
Тестовые задания для собеседования в Regard

Соберите Docker-контейнер для локальной разработки

```shell
docker compose build --progress=plain  --build-arg USER_ID=$(id -u ${USER}) --build-arg GROUP_ID=$(id -g ${USER})
```

Запустите стек контейнеров с помощью `compose`

```
docker compose up -d
```

Проект доступен по адресу http://localhost
