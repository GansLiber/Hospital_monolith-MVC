<div style='display: flex'>
  <h2 style='margin-right: 10px'>Добавление в систему</h2>
  <h3 style='color: #1334bb;'><?= $message ?? '';?></h3>



</div>

<div class="row">
  <div class="col-md-6">
    <h3>Регистрация нового пользователя</h3>
    <form method='post' action='/MCVphpPractice/addUser'>
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
      <div class="col-md-6">
        <label for="role" class="form-label">Роль</label>
        <select class="form-select" name="id_role" id="role">
          <option value="3">Доктор</option>
          <option value="2">Регистратор</option>
          <option value="1">Админ</option>
        </select>
      </div>
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
      <div class="mb-3">
        <label for="login" class="form-label">Логин</label>
        <input type="text" class="form-control" name="login" id="login">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="mb-3" id='position-field'>
        <label for="position" class="form-label">Должность</label>
        <input type="text" class="form-control" name="position" id="position">
      </div>
      <div class="mb-3" id='role-field'>
        <label for="specialization" class="form-label">Специальность</label>
        <select class="form-select" name='id_specialization' id="role">
          <option value="1">Хирург</option>
          <option value="2">Терапевт</option>
        </select>
      </div>
      <div class="mb-3" id='date-field'>
        <label for="date" class="form-label">Дата рождения</label>
        <input type="date" class="form-control" name="date_birth" id="date">
      </div>
      <button type="submit" class="btn btn-primary">Зарегистрировать</button>
    </form>
  </div>
  <div class="col-md-6">
    <h3>Добавления кабинета</h3>
    <form method="post" action='/MCVphpPractice/addCab'>
      <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
      <div class="mb-3">
        <label for="room_number" class="form-label">Номер кабинета</label>
        <input type="text" class="form-control" name="numberCab" id="room_number">
      </div>
      <div class="mb-3">
        <label for="floor" class="form-label">Этаж</label>
        <input type="text" class="form-control" name="floor" id="floor">
      </div>
      <button type="submit" class="btn btn-primary">Добавить кабинет</button>
    </form>
  </div>
</div>

<script>
  const roleSelect = document.getElementById('role')
  const positionField = document.getElementById('position-field')
  const roleField = document.getElementById('role-field')

  roleSelect.addEventListener('change', () => {
    const selectedRole = roleSelect.value

    if (selectedRole === '3') { // Доктор
      positionField.style.display = 'block'
      roleField.style.display = 'block'
    } else if (selectedRole === '2') { // Регистратор
      positionField.style.display = 'none'
      roleField.style.display = 'none'
    } else { // Админ
      positionField.style.display = 'none'
      roleField.style.display = 'none'
    }
  })
</script>
