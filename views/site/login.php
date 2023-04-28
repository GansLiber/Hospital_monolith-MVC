<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Авторизация</h2>
            <?php if(isset($message)): ?>
              <h3 class="text-center text-danger"><?= $message ?></h3>
            <?php endif; ?>
            <?php if(!app()->auth::check()): ?>
              <form method="post">
                <div class="form-group">
                  <label for="login">Логин:</label>
                  <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="form-group">
                  <label for="password">Пароль:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Войти</button>
              </form>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

