<div style='display: flex'>
    <h2 style='margin-right: 10px'>Поиск записи</h2>
    <h3 style='color: #1334bb;'><?= $message ?? ''; ?></h3>
</div>

<div class="row">
    <div class="col-md-6">
        <form method='post'>
          <div class="col-md-6">
            <label  for="cabinet" class="form-label">Доктор</label>
            <input class="form-control"  type='text' id='cabinet'>
          </div>
          <div class="col-md-6">
            <label  for="cabinet" class="form-label">Пациент</label>
            <input class="form-control"  type='text' id='cabinet'>
          </div>
            <div class="col-md-6">
                <label  for="cabinet" class="form-label">Кабинет</label>
                <input class="form-control"  type='text' id='cabinet'>
            </div>
            <button type="submit" class="btn btn-primary" style='margin-top: 20px'>Найти</button>
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
              <p>Кабинет: <?= $appointment->cabinet->numberCab?></p>
              <p>Дата записи: <?= $appointment->date_time?></p>
              <button
                type="button"
                class="btn btn-primary"
                onclick="location.href='<?= app()->route->getUrl('/deleteMe?id=' . $appointment->id_appointment)?>'"
              >Отменить</button>
              <hr>
              <hr>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
</div>