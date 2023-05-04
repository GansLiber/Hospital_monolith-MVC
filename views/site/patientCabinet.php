<h2>gabella</h2>
<div class="container" style='margin-top: 30px'>
    <div class="row">
        <div class="col-md-4">
            <h4 class="card-title">Пациент</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">ФИО: <?= $patient->name ?> <?= $patient->surname ?> <?= $patient->patronymic ?></p>
                    <p class="card-text">Дата рождения: <?= $patient->date_birth ?> </p>
                </div>
            </div>
        </div>
            <div class="col-md-8">
                <h4 class="card-title">Записи</h4>
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($myPatients as $myPatient): ?>

                            <p>ФИО: <?= $myPatient->name ?> <?= $myPatient->surname ?> <?= $myPatient->patronymic ?></p>
                            <p>Дата записи: <?= $myPatient->pivot->date_time?></p>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </div>
</div>