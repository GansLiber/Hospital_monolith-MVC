<div style='display: flex'>
    <h2 style='margin-right: 10px'>Поиск записи</h2>
    <h3 style='color: #1334bb;'><?= $message ?? ''; ?></h3>
</div>

<div class="row">
    <div class="col-md-6">
        <form method='post'>
            <div class="col-md-6">
                <label for="doc" class="form-label">Доктор</label>
                <select class="form-select" name="id_user" id="doc">
                    <?php
                    foreach ($docs as $doc) {
                        ?>
                        <option value="<?= $doc->id ?> ">
                            <?= $doc->specialization ?> <?= $doc->name ?> <?= $doc->surname ?> <?= $doc->patronymic ?>
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
            <button type="submit" class="btn btn-primary" style='margin-top: 20px'>Найти</button>
        </form>
    </div>
    <div class="col-md-8">
        <h4 class="card-title" style='margin-top: 15px'>Результаты</h4>
        <div class="card">
            <div class="card-body">
                <?php foreach ($appointments as $appointment): ?>
                    <p>ФИО: <?= $appointment->name ?> <?= $appointment->surname ?> <?= $appointment->patronymic ?></p>
                    <p>Дата записи: <?= $appointment->date_time?></p>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>