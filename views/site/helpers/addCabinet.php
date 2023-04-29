<?php ?>
    <h3>Добавления кабинета</h3>
    <form method="post" action='/MCVphpPractice/addCab'>
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
