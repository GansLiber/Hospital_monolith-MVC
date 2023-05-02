<h2>Личный кабинет</h2>
<div class="container" style='margin-top: 30px'>
  <div class="row">
    <div class="col-md-4">
      <h4 class="card-title">Данные пользователя</h4>
      <div class="card mb-4">
        <div class="card-body">
          <p class="card-text">
            ФИО: <?= app()->auth::user()->name ?> <?= app()->auth::user()->surname ?> <?= app()->auth::user()->patronymic ?></p>
          <p class="card-text">Дата рождения: <?= date('d.m.Y', strtotime(app()->auth::user()->dataBirth)) ?> </p>
          <p class="card-text">Роль: <?= app()->auth::user()->getRole->role ?></p>
        </div>
      </div>
    </div>
      <?php if (\Src\Auth\Auth::user()->getRole->role ==='doctor'){ ?>
    <div class="col-md-8">
      <h4 class="card-title">Мои пациенты</h4>
      <div class="card">
        <div class="card-body">
            <?php foreach ($myPatients as $myPatient): ?>
              <p>ФИО: <?= $myPatient->name ?> <?= $myPatient->surname ?> <?= $myPatient->patronymic ?></p>
              <p>Дата записи: <?= $myPatient->date_time?></p>
              <hr>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
      <?php }; ?>
  </div>
</div>
