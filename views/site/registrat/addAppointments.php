<div style='display: flex'>
  <h2 style='margin-right: 10px'>Запись на прием</h2>
  <h3 style='color: #1334bb;'><?= $message ?? ''; ?></h3>
</div>

<div class="row">
  <div class="col-md-6">
    <h3>Новая запись</h3>
    <form method='post'>
      <div class="col-md-6">
        <label for="doc" class="form-label">Доктор</label>
        <select class="form-select" name="id_user" id="doc">
            <?php
            foreach ($docs as $doc) {
                ?>
              <option value="<?= $doc->id ?> ">
                  <?= $doc->specialization ?> <?= $doc->name ?> <?= $doc->surname ?> <?= $doc->patronymic ?> <?= $doc->getSpecialization->specialization ?>
              </option>
              <p>----------------</p>
                <?php
            }
            ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="patient" class="form-label">Пациент</label>
        <select class="form-select" name="id_patient" id="patient">
          <?php
          foreach ($patients as $patient) {
              ?>
            <option value="<?= $patient->id_patient ?> ">
                <?= $patient->name ?> <?= $patient->surname ?> <?= $patient->patronymic ?>
            </option>
            <p>----------------</p>
              <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="cabinet" class="form-label">Кабинет</label>
        <select class="form-select" name="id_cabinet" id="cabinet">
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
      <div class="col-md-6" id='date-field'>
        <label for="date" class="form-label">Дата и время записи</label>
        <input type="datetime-local" class="form-control" name="date_time" id="date">
      </div>
      <button type="submit" class="btn btn-primary" style='margin-top: 20px'>Записать</button>
    </form>
  </div>
  <div class="col-md-8">
    <h4 class="card-title">Все записи</h4>
    <div class="card">
      <div class="card-body">
          <?php
//          var_dump($appointments); die();
          foreach ($appointments as $appointment): ?>
            <p>ФИО: <?= $appointment->name ?> <?= $appointment->surname ?> <?= $appointment->patronymic ?></p>
            <p>Дата записи: <?= $appointment->date_time?></p>
            <hr>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>