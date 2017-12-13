    <section class="lot-item container">
        <h2><?=htmlspecialchars($lot['name']); ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="img/<?=htmlspecialchars($lot['image_path']); ?>" width="730" height="548" alt="<?=htmlspecialchars($lot['lot-name']); ?>">
                </div>
                <p class="lot-item__category">Категория: <span><?=$lot['category_title']; ?></span></p>
                <p class="lot-item__description"><?=htmlspecialchars($lot['description']); ?></p>
            </div>
            <div class="lot-item__right">
            <?php  $class = (!empty($error)) ? "form__item--invalid" : "";
                   if (isset($_SESSION['user']) && empty($_COOKIE["mybet"][$id]) ): ?>
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        <?=htmlspecialchars(time_remaining($lot['end_date'])); ?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?=htmlspecialchars($lot['rate']); ?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?=htmlspecialchars($lot['rate'] + $lot['step']); ?></span>
                        </div>
                    </div>
                    <form class="lot-item__form <?=$class; ?>" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="<?=htmlspecialchars($lot['rate'] + $lot['step']); ?>">
                            <span class="form__error"><?=$error; ?></span>
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                    <span class="form__error"><?=$error; ?></span>
                </div>
            <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<?=count((array)($bets)); ?>)</h3>
                    <table class="history__list">
                    <?php foreach($bets as $value): ?>
                        <tr class="history__item">
                            <td class="history__name"><?=htmlspecialchars($value['username']); ?></td>
                            <td class="history__price"><?=htmlspecialchars($value['price']); ?> р</td>
                            <td class="history__time"><?=format_time($value['create_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>