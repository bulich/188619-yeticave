<?php $classname = ($errors) ? "form--invalid" : ""; ?>
<form class="form container <?=$classname;?>" action="sign-up.php" method="post"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>

    <?php $class = (!empty($errors['email'])) ? "form__item--invalid" : "";
          $value = (!empty($user['email'])) ? $user['email'] : ""; ?>  
    <div class="form__item <?=$class;?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" value="<?=htmlspecialchars($value);?>" placeholder="Введите e-mail">
      <span class="form__error"><?=$errors['email']; ?></span>
    </div>

    <?php $class = (!empty($errors['password'])) ? "form__item--invalid" : ""; ?> 
    <div class="form__item <?=$class;?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль">
      <span class="form__error"><?=$errors['password']; ?></span>
    </div>

    <?php $class = (!empty($errors['name'])) ? "form__item--invalid" : "";
          $value = (!empty($user['name'])) ? $user['name'] : ""; ?> 
    <div class="form__item <?=$class;?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" value="<?=htmlspecialchars($value);?>" placeholder="Введите имя">
      <span class="form__error"><?=$errors['password']; ?></span>
    </div>


    <?php $class = (!empty($errors['message'])) ? "form__item--invalid" : "";
          $value = (!empty($user['message'])) ? $user['message'] : ""; ?> 
    <div class="form__item <?=$class;?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" value="<?=htmlspecialchars($value);?>" placeholder="Напишите как с вами связаться"></textarea>
      <span class="form__error"><?=$errors['message']; ?></span>
    </div>

    <?php $value = (!empty($user['image-path'])) ? $user['image-path'] : ""; 
          $class = (!empty($user['image-path'])) ? "form__item--uploaded" : ""; ?>
    <div class="form__item form__item--file form__item--last <?=$class;?>">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/<?=htmlspecialchars($value);?>" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="photo" value="<?=$value; ?>">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <?php if (!empty($errors['Файл'])) :  ?>
    <span class="form__error form__error--bottom"><?=$errors['Файл']; ?></span>
    <?php endif; ?>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="#">Уже есть аккаунт</a>
  </form>
</main>