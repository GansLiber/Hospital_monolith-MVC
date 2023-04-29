<h2>Личный кабинет</h2>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Данные пользователя</h4>
    <p class="card-text">ФИО: <?= app()->auth::user()->name ?> <?= app()->auth::user()->surname ?> <?= app()->auth::user()->patronymic ?></p>
    <p class="card-text">Дата рождения: <?= date('d.m.Y', strtotime(app()->auth::user()->dataBirth)) ?> </p>
    <p>//////все пользователи//////</p>
      <?php
      foreach ($users as $user){
      ?>
    <p>Имя: <?= $user->name ?></p>
    <p>Фамилия: <?= $user->surname ?></p>
    <p>Отчество: <?= $user->patronymic ?></p>
    <p>Дата рождения: <?= $user->date_birth ?></p>
    <p>Роль: <?= $user->getRole->role ?></p>
          <p>----------------</p>
    <?php
    }
      ?>
  </div>
</div>