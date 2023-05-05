<?php if (\Src\Auth\Auth::user()->getRole->role ==='doctor'){ ?>
<h1>Поиск моих пациентов</h1>
<?php }else{?>
  <h1>Поиск пациентов</h1>
  <?php }; ?>
<form method="post">
  <div class="mb-3">
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
<!--  <div class="mb-3">-->
<!--    <label for="birthdate" class="form-label">Дата рождения:</label>-->
<!--    <input type="date" id="birthdate" name="birthdate" class="form-control">-->
<!--  </div>-->
<!--  <div class="mb-3">-->
<!--    <label for="record_date" class="form-label">Поиск по дате записи:</label>-->
<!--    <input type="date" id="record_date" name="record_date" class="form-control">-->
<!--  </div>-->
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Искать</button>
  </div>
</form>
<div class="mt-4">
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
          <td>
            <button
              type="button"
              class="btn btn-primary"
              onclick="location.href='<?= app()->route->getUrl('/patientCabinet?id=' . $patient->id_patient )?>'"
            >Открыть</button>
          </td>
        <tr>

    <?php endforeach; ?>

    </tbody>
  </table>
</div>
