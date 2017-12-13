<?php $classname = ($errors) ? "form--invalid" : ""; ?> 
  <form class="form form--add-lot container <?=$classname;?>" action="add.php" method="post" enctype="multipart/form-data"> 
  <h2>Добавление лота</h2>
    <div class="form__container-two">


    <?php $class = (!empty($errors['Название лота'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['lot-name'])) ? $lot['lot-name'] : ""; ?> 
      <div class="form__item <?=$class;?>">
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" value="<?=htmlspecialchars($value);?>" placeholder="Введите наименование лота" required>
        <span class="form__error"><?=$errors['Название лота']; ?></span>
      </div>


      <?php $class = (!empty($errors['Категория'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['category'])) ? $lot['category'] : ""; ?> 
      <div class="form__item <?=$class;?>">
        <label for="category">Категория</label>
        <select id="category" name="category" value="<?=htmlspecialchars($value);?>" required>
          <option value="0">Выберите категорию</option>
          <option value="1">Доски и лыжи</option>
          <option value="2">Крепления</option>
          <option value="3">Ботинки</option>
          <option value="4">Одежда</option>
          <option value="6">Инструменты</option>
          <option value="5">Разное</option>
        </select>
        <span class="form__error"><?=$errors['Категория']?></span>
      </div>
    </div>


    <?php $class = (!empty($errors['Описание'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['message'])) ? $lot['message'] : ""; ?>
    <div class="form__item form__item--wide <?=$class;?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required><?=htmlspecialchars($value);?></textarea>
      <span class="form__error"><?=$errors['Описание']; ?></span>
    </div>

    <?php $value = (!empty($lot['path'])) ? $lot['path'] : ""; 
          $class = (!empty($lot['path'])) ? "form__item--uploaded" : ""; ?>
    <div class="form__item form__item--file <?=$class;?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/<?=htmlspecialchars($value);?>" width="113" height="113" alt="<?= print(htmlspecialchars($lot['url'])); ?>">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" name="userfile" type="file" id="photo2" required>
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>

    <?php $class = (!empty($errors['Значение начанльной цены'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['lot-rate'])) ? $lot['lot-rate'] : ""; ?>
    <div class="form__container-three">
      <div class="form__item form__item--small <?=$class;?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=htmlspecialchars($value);?>" required>
        <span class="form__error"><?=$errors['Значение начанльной цены']; ?></span>
      </div>

      <?php $class = (!empty($errors['Значение шага'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['lot-step'])) ? $lot['lot-step'] : ""; ?>
      <div class="form__item form__item--small <?=$class;?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=htmlspecialchars($value);?>" required>
        <span class="form__error"><?=$errors['Значение шага']; ?></span>
      </div>

      <?php $class = (!empty($errors['Дата'])) ? "form__item--invalid" : "";
          $value = (!empty($lot['lot-date'])) ? $lot['lot-date'] : ""; ?>
      <div class="form__item <?=$class;?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=htmlspecialchars($value);?>" required>
        <span class="form__error"><?=$errors['Дата']; ?></span>
      </div>
    </div>

    <?php if (!empty($errors['Файл'])) :  ?>
    <span class="form__error form__error--bottom"><?=$errors['Файл']; ?></span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>

