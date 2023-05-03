<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pop it MVC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
          integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
          integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
          crossorigin="anonymous"></script>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <?php
            if (!app()->auth::check()):
                ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
              </li>
            <?php
            else:
                ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= app()->route->getUrl('/nick') ?>">Nick</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= app()->route->getUrl('/patients') ?>">Поиск пациентов</a>
              </li>
            <?php if (\Src\Auth\Auth::user()->getRole->role ==='registrator' || \Src\Auth\Auth::user()->getRole->role === 'admin'){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= app()->route->getUrl('/addPatient') ?>">Добавить пациента</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= app()->route->getUrl('/registrat/addAppointments') ?>">Добавить запись</a>
                </li>
            <?php }; ?>
            <?php if (\Src\Auth\Auth::user()->getRole->role ==='admin'){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= app()->route->getUrl('/admin/signup') ?>">Добавление в систему</a>
                </li>
            <?php }; ?>
            <?php
            endif;
            ?>
        </ul>
          <?php
          if (app()->auth::check()):
              ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?= app()->route->getUrl('/myCabinet') ?>">Кабинет</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= app()->route->getUrl('/logout') ?>">Выход
                  (<?= app()->auth::user()->name ?>)</a>
              </li>
            </ul>
          <?php
          endif;
          ?>
      </div>
    </div>
  </nav>
</header>

<main style='margin-left: 2em; margin-right: 2em'>
    <?= $content ?? '' ?>
</main>

</body>
</html>
