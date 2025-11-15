# Hospital Monolith MVC

Система управления поликлиникой на базе собственного PHP MVC фреймворка.

## Описание

Веб-приложение для управления поликлиникой с функционалом:
- Управление пациентами
- Запись на приемы
- Управление кабинетами
- Ролевая система доступа (администратор, регистратор, врач)
- Личные кабинеты для пользователей и пациентов
- Поиск пациентов и записей

## Технологии

- **PHP**: 7.4+ или 8.0+
- **MySQL**: База данных
- **Composer**: Управление зависимостями
- **Illuminate Database**: Eloquent ORM (Laravel)
- **FastRoute**: Маршрутизация

## Структура проекта

```
Hospital_monolith-MVC/
├── app/
│   ├── Controller/          # Контроллеры
│   ├── Model/              # Модели данных
│   └── Middlewares/        # Middleware для аутентификации и авторизации
├── config/                 # Конфигурационные файлы
├── core/                   # Ядро фреймворка
│   └── Src/               # Основные классы (Application, Route, Auth, View)
├── public/                 # Публичная директория (точка входа)
├── routes/                 # Маршруты приложения
└── views/                  # Представления (шаблоны)

```

## Установка

1. Клонируйте репозиторий:
```bash
git clone <repository-url>
cd Hospital_monolith-MVC
```

2. Установите зависимости:
```bash
composer install
```

3. Настройте базу данных в `config/db.php`:
```php
return [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'MVCpoliclinic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
];
```

4. Создайте базу данных и импортируйте схему (если есть SQL-файл)

5. Настройте веб-сервер:
   - Укажите корневую директорию на `public/`
   - Для Apache включите mod_rewrite
   - Для Nginx настройте обработку через `public/index.php`

## Использование

### Основные маршруты

- `GET /login` - Страница входа
- `POST /login` - Авторизация
- `GET /logout` - Выход из системы
- `GET /myCabinet` - Личный кабинет пользователя
- `GET /patientCabinet` - Кабинет пациента
- `GET /serchPatients` - Поиск пациентов
- `GET /serchAppointment` - Поиск записей
- `POST /addPatient` - Добавление пациента (требует роль: registrator|admin)
- `POST /registrat/addAppointments` - Добавление записи (требует роль: registrator|admin)
- `GET /admin/signup` - Регистрация нового пользователя (требует роль: admin)
- `POST /addCab` - Добавление кабинета (требует роль: admin)
- `POST /addUser` - Добавление пользователя (требует роль: admin)

### Middleware

- `auth` - Проверка аутентификации
- `can:role` - Проверка роли пользователя (например: `can:admin`, `can:registrator|admin`)

### Примеры маршрутов

```php
// Защищенный маршрут с проверкой аутентификации
Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');

// Маршрут с проверкой роли
Route::add(['GET', 'POST'], '/admin/signup', [Controller\Site::class, 'signup'])
    ->middleware('auth', 'can:admin');
```

## Модели данных

- **User** - Пользователи системы (врачи, регистраторы, администраторы)
- **Patient** - Пациенты
- **Appointment** - Записи на прием
- **Cabinet** - Кабинеты
- **Role** - Роли пользователей
- **Specialization** - Специализации врачей
- **Diagnose** - Диагнозы

## Конфигурация

Основные настройки находятся в директории `config/`:

- `app.php` - Настройки приложения (классы аутентификации, middleware)
- `db.php` - Настройки базы данных
- `path.php` - Пути к директориям (если используется)

## Разработка

### Добавление нового контроллера

1. Создайте класс в `app/Controller/`
2. Добавьте маршрут в `routes/web.php`
3. Создайте представления в `views/` (если необходимо)

### Добавление middleware

1. Создайте класс в `app/Middlewares/`
2. Зарегистрируйте в `config/app.php` в массиве `routeMiddleware`
3. Используйте в маршрутах через `->middleware('name')`


