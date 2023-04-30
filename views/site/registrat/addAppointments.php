<div style='display: flex'>
    <h2 style='margin-right: 10px'>Запись на прием</h2><h1>///ЗАГЛУШКА</h1>
    <h3 style='color: #1334bb;'><?= $message ?? ''; ?></h3>
</div>

<div class="row">
    <div class="col-md-6">
        <h3>Новая запись</h3>
        <form method='post'>
            <div class="col-md-6">
                <label for="role" class="form-label">Пациент</label>
                <select class="form-select" name="id_role" id="role">
                    <option value="1">Доктор</option>
                    <option value="2">Регистратор</option>
                    <option value="3">Админ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">Доктор</label>
                <select class="form-select" name="id_role" id="role">
                    <option value="1">Доктор</option>
                    <option value="2">Регистратор</option>
                    <option value="3">Админ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">Кабинет</label>
                <select class="form-select" name="id_role" id="role">
                    <option value="1">Доктор</option>
                    <option value="2">Регистратор</option>
                    <option value="3">Админ</option>
                </select>
            </div>
            <div class="mb-3" id='date-field'>
                <label for="date" class="form-label">Дата и время записи</label>
                <input type="date" class="form-control" name="date_birth" id="date">
            </div>
            <button type="submit" class="btn btn-primary">Записать</button>
        </form>
    </div>
</div>