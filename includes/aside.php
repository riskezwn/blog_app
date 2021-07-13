<aside class="sign-in-up">
  <div class="container">
    <h5>inicia sesión</h5>
    <form action="#" class="sign-in">
      <label for="email-log">Email</label>
      <div class="form-group">
        <i class="fas fa-user"></i>
        <input type="email" name="email-log" id="email-log" placeholder="user@example.com" />
      </div>
      <label for="pass-log">Contraseña</label>
      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="pass-log" id="password-log" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" />
      </div>
      <input type="submit" class="btn" value="LOG IN" />
    </form>
  </div>
  <div class="container">
    <h5>o regístrate</h5>
    <form action="registro.php" class="sign-up" method="POST">
      <label for="name">Nombre</label>
      <div class="form-group">
        <input type="text" name="name" id="name" placeholder="John" />
      </div>
      <?php
      if (isset($_SESSION['errors'])) echo checkFormError($_SESSION['errors'], 'name');
      ?>
      <label for="subname">Apellidos</label>
      <div class="form-group">
        <input type="text" name="subname" id="subname" placeholder="Doe" />
      </div>
      <?php
      if (isset($_SESSION['errors'])) echo checkFormError($_SESSION['errors'], 'subname');
      ?>
      <label for="email">Email</label>
      <div class="form-group">
        <input type="email" name="email" id="email" placeholder="user@example.com" />
      </div>
      <?php
      if (isset($_SESSION['errors'])) echo checkFormError($_SESSION['errors'], 'email');
      ?>
      <label for="pass">Contraseña</label>
      <div class="form-group">
        <input type="password" name="pass" id="pass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" />
      </div>
      <?php
      if (isset($_SESSION['errors'])) echo checkFormError($_SESSION['errors'], 'pass');
      ?>
      <input type="submit" class="btn" value="SIGN UP" />
    </form>
    <?php
    deleteSession('errors');
    ?>
  </div>
  <img src="assets/images/undraw_newspaper_k72w.svg" alt="newspaper" class="img" />
</aside>