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
      <?php if (\Src\Auth\Auth::user()->getRole->role === 'doctor') { ?>
        <div class="col-md-8">
          <h4 class="card-title">Мои записи</h4>
          <div class="card">
            <div class="card-body">
                <?php foreach ($myAppointments as $myAppointment): ?>

                  <p>ФИО: <?= $myAppointment->patient->name ?>
                      <?= $myAppointment->patient->surname ?>
                      <?= $myAppointment->patient->patronymic ?></p>
                  <p>Дата записи: <?= $myAppointment->patient->date_birth ?></p>

                  <form method='post' style='display: flex'>
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <input type='hidden' name='id_appointment'
                           value="<?= $myAppointment->id_appointment ?>">

                    <label for="record" class="form-label">Диагноз: </label>
                      <?php if ($myAppointment->diagnose->disease) { ?>
                        <p>&nbsp<?= $myAppointment->diagnose->disease ?></p>
                      <?php } else { ?>
                        <input type='text' id='record' name='disease'>
                        <button type="submit" class="btn btn-primary" style='margin-left: 20px'>Поставить</button>
                      <?php } ?>
                  </form>
                  <hr>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php }; ?>
  </div>
</div>
