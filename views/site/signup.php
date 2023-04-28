<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>

<form method="post">
  <div class="mb-3">
    <label for="role" class="form-label">Роль</label>
    <select class="form-select" name="id_role" id="role">
      <option value="1">Доктор</option>
      <option value="2">Регистратор</option>
      <option value="3">Админ</option>
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
    <label for="specialization" class="form-label">Роль</label>
    <select class="form-select" name="id_role" id="role">
      <option value="1">Хирург</option>
      <option value="2">Терапевт</option>
    </select>
  </div>
  <div class="mb-3" id='date-field'>
    <label for="date" class="form-label">Дата рождения</label>
    <input type="date" class="form-control" name="date" id="date">
  </div>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>

<script>
  const roleSelect = document.getElementById('role');
  const positionField = document.getElementById('position-field');
  const roleField = document.getElementById('role-field');

  roleSelect.addEventListener('change', () => {
    const selectedRole = roleSelect.value;

    if (selectedRole === '1') { // Доктор
      positionField.style.display = 'block';
      roleField.style.display = 'block';
    } else if (selectedRole === '2') { // Регистратор
      positionField.style.display = 'none';
      roleField.style.display = 'none';
    } else { // Админ
      positionField.style.display = 'none';
      roleField.style.display = 'none';
    }
  });
</script>
