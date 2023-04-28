<h1>Поиск пациентов</h1>
<form action="/search" method="post">
  <div>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname">
  </div>
  <div>
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name">
  </div>
  <div>
    <label for="patronymic">Отчество:</label>
    <input type="text" id="patronymic" name="patronymic">
  </div>
  <div>
    <label for="birthdate">Дата рождения:</label>
    <input type="date" id="birthdate" name="birthdate">
  </div>
  <div>
    <label for="record_date">Поиск по дате записи:</label>
    <input type="date" id="record_date" name="record_date">
  </div>
  <div>
    <button type="submit">Искать</button>
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
      <th scope="col">Дата записи</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Иванов</td>
      <td>Иван</td>
      <td>Иванович</td>
      <td>01.01.1980</td>
      <td>01.01.2023</td>
    </tr>
    <tr>
      <td>Петров</td>
      <td>Петр</td>
      <td>Петрович</td>
      <td>01.01.1990</td>
      <td>02.01.2023</td>
    </tr>
    </tbody>
  </table>
</div>
