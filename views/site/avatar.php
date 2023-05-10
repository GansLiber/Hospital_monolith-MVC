
<head>
    <title>HTML-форма для загрузки файлов</title>
    <meta charset='utf-8'>
</head>
<img src='' alt=''>
<form method="post" enctype="multipart/form-data">
    <h2>Форма для загрузки файлов</h2>
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <input type="file" class="form-control" name="filename"><br>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>