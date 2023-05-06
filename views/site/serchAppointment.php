<div style='display: flex'>
  <h2 style='margin-right: 10px'>Поиск записи</h2>
  <h3 style='color: #1334bb;'><?= $message ?? ''; ?></h3>
</div>

<div style='display: flex'>
  <div class="col-md-6">
    <form method='post'>
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>" />
      <div class="col-md-6">
      <label for="doc" class="form-label">Доктор</label>
      <select class="form-select" name="user" id="doc">
        <option selected value=''></option>
          <?php
          foreach ($docs as $doc) {
              ?>
            <option value="<?= $doc->id ?> ">
                <?= $doc->specialization->specialization ?>
                <?= $doc->name ?> <?= $doc->surname ?>
                <?= $doc->patronymic ?>
                <?= $doc->getSpecialization->specialization ?>
            </option>
              <?php
          }
          ?>
      </select>
      </div>
      <div class="col-md-6">
        <label for="patient" class="form-label">Пациент</label>
        <select class="form-select" name="patient" id="patient">
          <option selected value=''></option>
            <?php
            foreach ($patients as $patient) {
                ?>
              <option value="<?= $patient->id_patient ?> ">
                  <?= $patient->name ?>
                  <?= $patient->surname ?>
                  <?= $patient->patronymic ?>
              </option>
                <?php
            }
            ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="cabinet" class="form-label">Кабинет</label>
        <select class="form-select" name="cabinet" id="cabinet">
          <option selected value=''></option>
            <?php
            foreach ($cabinets as $cabinet) {
                ?>
              <option value="<?= $cabinet->id_cabinet ?> ">
                Кабинет <?= $cabinet->numberCab ?> этаж <?= $cabinet->floor ?>
              </option>
                <?php
            }
            ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" style='margin-top: 20px'>Найти</button>
      <br><br>
    </form>
  </div>
  <div class="col-md-8">
    <h4 class="card-title">Записи</h4>
    <div class="card">
      <div class="card-body">
          <?php
          //          var_dump($appointments); die();
          foreach ($appointments as $appointment): ?>
            <p>Пациент: <?= $appointment->patient->name ?>
                <?= $appointment->patient->surname ?>
                <?= $appointment->patient->patronymic ?></p>
            <p>Доктор: <?= $appointment->user->specialization->specialization ?>
                <?= $appointment->user->name ?>
                <?= $appointment->user->surname ?>
                <?= $appointment->user->patronymic ?></p>
            <p>Кабинет: <?= $appointment->cabinet->numberCab ?></p>
            <p>Дата записи: <?= $appointment->date_time ?></p>
            <button
              type="button"
              class="btn btn-primary"
              onclick="location.href='<?= app()->route->getUrl('/deleteMe?id=' . $appointment->id_appointment) ?>'"
            >Отменить
            </button>
            <hr>
            <hr>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>