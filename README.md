# ITPark-test-task
###### Laravel v8.83.27 (PHP v8.1.0)

## WEB:

**/form** - FormController::index<br>

## REST API:

#### Films
**GET /api/films** - API\FilmController::index<br>
**POST /api/films** - API\FilmController::store
```
{
    "title": string:required,
    "publication_status": boolean,
    "poster": file (enctype: multipart/form-data),
    "genres": array[int]
}
```
Пример запроса
```
{
    "title": "Some film",
    "publication_status": false,
    "genres": [1, 4, 5]
}
```
**POST /api/films/{id}** - API\FilmController::publish<br>
**GET /api/films/{id}**  - API\FilmController::show<br>
**PUT /api/films/{id}** - API\FilmController::update
```
{
    "title": string:required,
    "publication_status": boolean,
    "poster": file (enctype: multipart/form-data),
    "genres": array[int]
}
```
Пример запроса
```
{
    "title": "Update film",
    "publication_status": true,
    "genres": [2, 3]
}
```
**DELETE /api/films/{id}** - destroy<br>

#### Genres
**GET /api/genres** - API\GenreController::index<br>
**POST /api/genres** - API\GenreController::store
```
{
    "name":string:required,
}
```
Example body
```
{
    "name": "Some genre",
}
```
**GET /api/genres/{id}** - API\GenreController::show<br>
**PUT /api/genres/{id}** - API\GenreController::update
```
{
    "name":string:required,
}
```
Пример запроса
```
{
    "name": "Some updated genre",
}
```
**DELETE /api/genres/{id}** - API\GenreController::destroy<br>

## Установка с Docker

- Загрузите репозиторий с помощью команды ```git clone https://github.com/AndrewYaremenko/ITPark-test-task.git```
- Перейдите в директорию проекта: ```cd ITPark-test-task```
- Установите необходимые PHP библиотеки, выполнив команду: ```composer install```
- Установите необходимые NPM библиотеки, выполнив команду: ```npm install```
- Выполнить билд фронта: ```npm run dev```
- Скопируйте файл ```.env.docker``` и переименуйте его в ```.env```
- Запустить приложение: ```docker-compose up -d```
- Открыть терминал контейнера: ```docker exec -it project_app bash```
- Выполните миграцию таблиц в БД с помощью команды: ```php artisan migrate```
- Выполните миграцию таблиц в БД с помощью команды: ```php artisan bd:seed```
- Сгенерируйте ключ приложения, выполнив команду: ```php artisan key:generate```
- Создайте символическую ссылку для обеспечения доступа к файлам: ```php artisan storage:link```

## Установка без Docker

- Загрузите репозиторий с помощью команды ```git clone https://github.com/AndrewYaremenko/ITPark-test-task.git```
- Перейдите в директорию проекта: ```cd ITPark-test-task```
- Установите необходимые PHP библиотеки, выполнив команду: ```composer install```
- Установите необходимые NPM библиотеки, выполнив команду: ```npm install```
- Выполнить билд фронта: ```npm run dev```
- Скопируйте файл ```.env.example``` и переименуйте его в ```.env```, затем откройте файл и укажите следующие поля
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
</pre>
- Выполните миграцию таблиц в БД с помощью команды: ```php artisan migrate```
- Выполните миграцию таблиц в БД с помощью команды: ```php artisan bd:seed```
- Сгенерируйте ключ приложения, выполнив команду: ```php artisan key:generate```
- Создайте символическую ссылку для обеспечения доступа к файлам: ```php artisan storage:link```
- Запустить сервер: ```php artisan serve```