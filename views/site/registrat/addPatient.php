
<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>

<div class="row">
  <div class="col-md-6">
    <form method='post'>
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
      <div class="mb-3" id='date-field'>
        <label for="date" class="form-label">Дата рождения</label>
        <input type="date" class="form-control" name="date_birth" id="date">
      </div>
      <button type="submit" class="btn btn-primary">Зарегистрировать</button>
    </form>
  </div>
</div>
