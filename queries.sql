/* Категории */
INSERT INTO categories (name)
  VALUES ('Доски и лыжи'),
  VALUES ('Крепления'),
  VALUES ('Ботинки'),
  VALUES ('Одежда'),
  VALUES ('Разное'),
  VALUES ('Инструменты');

/* Пользователи*/
INSERT INTO users (reg_date, email, username, pass, avatar, contacts, lots_id, bets_id)
  VALUES ('2017-08-08', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'img/user.jpg', 'ignat.v@gmail.com', 0, 2),
  VALUES ('2017-10-02', 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'img/user.jpg', 'kitty_93@li.ru', 1, 1),
  VALUES ('2017-05-15', 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'img/user.jpg', 'kitty_93@li.ru', 2, 0);

/* Лоты*/
INSERT INTO lots (create_date, name, message, img, rate, end_date, step, author_id, winner_id, category_id, is_open)
  VALUES ('2017-12-01', '2014 Rossignol District Snowboard', '2014 Rossignol District Snowboard', 'lot-1.jpg', 10000, '2017-12-21', 1000, 1, 2, 0, 1),
  VALUES ('2017-12-01', 'DC Ply Mens 2016/2017 Snowboard', 'DC Ply Mens 2016/2017 Snowboard', 'lot-2.jpg', 5000, '2017-12-30', 500, 2, 0, 0, 1),
  VALUES ('2017-12-01', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro 2015 года размер L/XL', 'lot-3.jpg', 6000, '2017-12-19', 250, 0, 1, 1, 1),
  VALUES ('2017-12-01', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда DC Mutiny Charocal', 'lot-4.jpg', 7999, '2017-12-12', 500, 2, 1, 2, 1),
  VALUES ('2017-12-01', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда DC Mutiny Charocal', 'lot-5.jpg', 8600, '2017-12-15', 250, 0, 2, 3, 1),
  VALUES ('2017-12-01', 'Маска Oakley Canopy', 'Маска Oakley Canopy', 'lot-6.jpg', 3200, '2017-12-16', 320, 1, 0, 4, 1),

/*Ставки*/
INSERT INTO bets (create_date, price, author_id, lot_id)
  VALUES ('2017-12-02', 10000, 1, 2)
  VALUES ('2017-12-02', 12000, 0, 5)


/*Объединения*/
SELECT lots.id, lots.author_id FROM lots
JOIN users
ON lots.author_id = users.id;

SELECT lots.id, lots.winner_id FROM lots
JOIN users
ON lots.winner_id = users.id;

SELECT lots.id, lots.category_name FROM lots
JOIN categories
ON lots.category_id = categories.id;

SELECT bets.id, bets.author_id FROM bets
JOIN users
ON bets.author_id = users.id;

SELECT bets.id, bets.lot_id FROM bets
JOIN lots
ON bets.lot_id = lots.id;

/*получить список из всех категорий*/

SELECT * FROM categories;

/*получить самые новые, открытые лоты*/

SELECT * FROM lots WHERE is_open = 1;

/*найти лот по его названию или описанию*/

SELECT * FROM lots WHERE name = 'Куртка для сноуборда DC Mutiny Charocal';

/*обновить название лота по его идентификатору*/

UPDATE lots SET name = 'Новое название' WHERE id = 2;

/*получить список самых свежих ставок для лота по его идентификатору*/

SELECT * FROM bets WHERE lot_id = 2 ORDER BY create_date DESC;