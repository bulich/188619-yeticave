<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
        <?php foreach ($categories as $value): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="/"><?=htmlspecialchars($value['category_title']); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header"></div>
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
        <?php foreach ($items as $key => $value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="img/<?=htmlspecialchars($value['image_path']); ?>" width="350" height="260" alt="<?=htmlspecialchars($value['name']); ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=htmlspecialchars($value['category_title']); ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php<?="?id=" . $value['lot_id'];?>"><?=htmlspecialchars($value['name']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=htmlspecialchars($value['rate']); ?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=htmlspecialchars(time_remaining($value['end_date']));?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
    <?php if ($pages_count > 1): ?>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <?php foreach ($pages as $page): ?>
      <li class="pagination-item <?php if ($page == $cur_page): ?>pagination-item-active<?php endif; ?>"><a href="/?page=<?=htmlspecialchars($page);?>"><?=htmlspecialchars($page);?></a></li>
      <?php endforeach; ?>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
    <?php endif; ?>
</main>