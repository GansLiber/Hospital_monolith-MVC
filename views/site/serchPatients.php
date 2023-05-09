<?php if (\Src\Auth\Auth::user()->getRole->role === 'doctor') { ?>
  <h1>Поиск моих пациентов</h1>
<?php } else { ?>
  <h1>Поиск пациентов</h1>
<?php }; ?>
<div style='display: flex; justify-content: space-between'>
  <div class='col-md-5'>
    <h2>Введите данные</h2>
    <form method="post">
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>" />
      <div class="mb-6">
        <label for="surname" class="form-label">Фамилия:</label>
        <input type="text" id="surname" name="surname" class="form-control">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Имя:</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <div class="mb-3">
        <label for="patronymic" class="form-label">Отчество:</label>
        <input type="text" id="patronymic" name="patronymic" class="form-control">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Искать</button>
      </div>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Результаты поиска</h2>
    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">Фамилия</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Дата рождения</th>
        <th scope="col"></th>

      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($patients as $patient): ?>
      <tr>
        <td><?= $patient->surname ?></td>
        <td><?= $patient->name ?></td>
        <td><?= $patient->patronymic ?></td>
        <td><?= $patient->date_birth ?></td>
          <?php if (\Src\Auth\Auth::user()->getRole->role !=='doctor'){ ?>
        <td>
          <button
            type="button"
            class="btn btn-primary"
            onclick="location.href='<?= app()->route->getUrl('/patientCabinet?id=' . $patient->id_patient) ?>'"
          >Открыть
          </button>
        </td>
          <?php }; ?>
      <tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
