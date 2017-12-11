  <section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
      <?php foreach($bets as $key => $value): ?>
      <tr class="rates__item">
        <td class="rates__info">
          <div class="rates__img">
            <img src="img/<?=htmlspecialchars($value['image_path']); ?>" width="54" height="40" alt="<?=htmlspecialchars($value['name']); ?>">
          </div>
          <h3 class="rates__title"><a href="lot.php?id=<?=$value['lot_id']; ?>"><?=htmlspecialchars($value['name']); ?></a></h3>
        </td>
        <td class="rates__category">
          <?=htmlspecialchars($value['category_title']); ?>
        </td>
        <td class="rates__timer">
          <div class="timer timer--finishing"><?=time_remaining($value['end_date']); ?></div>
        </td>
        <td class="rates__price">
          <?=htmlspecialchars($bet_info[$key]['cost']); ?>
        </td>
        <td class="rates__time">
          <?=format_time(gmdate("Y-m-d H:i:s", $bet_info[$key]['time'])); ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </section>
</main>