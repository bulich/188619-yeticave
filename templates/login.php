<?php $classname = ($errors) ? "form--invalid" : ""; 
				$class = isset($errors['Email']) ? "form__item--invalid" : "";
				$value = isset($form['email']) ? $form['email'] : ""; ?>
  <form class="form container <?=$classname;?>" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?=$class;?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=htmlspecialchars($value);?>">
      <?php if ($class): ?>
      <span class="form__error"><?=$errors['Email'];?></span>
      <?php endif; ?>
    </div>
    <?php $class = isset($errors['Пароль']) ? "form__item--invalid" : "";
				  $value = isset($form['password']) ? $form['password'] : ""; ?>
    <div class="form__item form__item--last <?=$class;?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" value="<?=htmlspecialchars($value);?>" placeholder="Введите пароль">
      <?php if ($class): ?>
      <span class="form__error"><?=$errors['Пароль'];?></span>
      <?php endif; ?>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>
