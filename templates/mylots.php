<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
  <section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
      <?php foreach($bets as $key => $value): ?>
      <?php $bet_info = (array)json_decode($value); ?>
      <tr class="rates__item">
        <td class="rates__info">
          <div class="rates__img">
            <img src="img/<?=htmlspecialchars($items[$key]['path']); ?>" width="54" height="40" alt="<?=htmlspecialchars($items[$key]['lot-name']); ?>">
          </div>
          <h3 class="rates__title"><a href="lot.php?id=<?=$key; ?>"><?=htmlspecialchars($items[$key]['lot-name']); ?></a></h3>
        </td>
        <td class="rates__category">
          <?=htmlspecialchars($items[$key]['category']); ?>
        </td>
        <td class="rates__timer">
          <div class="timer timer--finishing"><?=htmlspecialchars(format_time($bet_info['time'])); ?></div>
        </td>
        <td class="rates__price">
          <?=htmlspecialchars($bet_info['cost']); ?>
        </td>
        <td class="rates__time">
          <?=htmlspecialchars(format_time($bet_info['time'])); ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </section>
</main>