<h2>gabella</h2>
<div class="container" style='margin-top: 30px'>
    <div class="row">
        <div class="col-md-4">
            <h4 class="card-title">Пациент</h4>
          <img style='width: 200px' src="<?= $patient->avatar ?>" alt=''>
          <button
            type="button"
            class="btn btn-primary"
            onclick="location.href='<?= app()->route->getUrl('/avatar?id=' . $patient->id_patient) ?>'"
          >Изменить аватар
          </button>
          <br><br>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">ФИО: <?= $patient->name ?> <?= $patient->surname ?> <?= $patient->patronymic ?></p>
                    <p class="card-text">Дата рождения: <?= $patient->date_birth ?> </p>
                </div>
            </div>
          <button id="edit-patient-btn" class="btn btn-primary">Изменить пациента</button>
            <form id="edit-patient-form" style='display: none' method='post'>
              <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
              <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
              <div class="mb-3" id="surname-field">
                <label for="surname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" name="surname" id="surname">
              </div>
              <div class="mb-3" id="patronymic-field">
                <label for="patronymic" class="form-label">Отчество</label>
                <input type="text" class="form-control" name="patronymic" id="patronymic">
              </div>



              <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
            <div class="col-md-8">
                <h4 class="card-title">Записи</h4>
                <div class="card">
                    <div class="card-body">
                        <?php
                        //          var_dump($patientAppointments); die();
                        foreach ($patientAppointments as $patientAppointment): ?>
                          <p>Пациент: <?= $patientAppointment->patient->name ?>
                              <?= $patientAppointment->patient->surname ?>
                              <?= $patientAppointment->patient->patronymic ?></p>
                          <p>Доктор: <?= $patientAppointment->user->specialization->specialization ?>
                              <?= $patientAppointment->user->name ?>
                              <?= $patientAppointment->user->surname ?>
                              <?= $patientAppointment->user->patronymic ?></p>
                          <p>Кабинет: <?= $patientAppointment->cabinet->numberCab?></p>
                          <p>Дата записи: <?= $patientAppointment->date_time?></p>
                          <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
  const editPatientBtn = document.getElementById('edit-patient-btn');
  const editPatientForm = document.getElementById('edit-patient-form');

  editPatientBtn.addEventListener('click', () => {
    editPatientForm.style.display = 'block';
    editPatientBtn.style.display = 'none';
  });


</script>