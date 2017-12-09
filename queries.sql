/* Категории */
INSERT INTO categories (category_title)
  VALUES ('Доски и лыжи'),
  ('Крепления'),
  ('Ботинки'),
  ('Одежда'),
  ('Разное'),
  ('Инструменты');

/* Пользователи*/
INSERT INTO users (reg_date, email, username, pass, avatar, contacts)
  VALUES ('2017-08-08 00:00:00', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'img/user.jpg', 'ignat.v@gmail.com'),
  ('2017-10-02 00:00:00', 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'img/user.jpg', 'kitty_93@li.ru'),
  ('2017-05-15 00:00:00', 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'img/user.jpg', 'kitty_93@li.ru');

/* Лоты*/
INSERT INTO lots (create_date, name, description, image_path, rate, end_date, step, author_id, winner_id, category_id)
  VALUES ('2017-12-01 00:00:00', '2014 Rossignol District Snowboard', '2014 Rossignol District Snowboard', 'lot-1.jpg', 10000, '2017-12-21 00:00:00', 1000, 1, 2, 1),
  ('2017-12-01 00:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'DC Ply Mens 2016/2017 Snowboard', 'lot-2.jpg', 5000, '2017-12-30 00:00:00', 500, 2, 1, 1),
  ('2017-12-01 00:00:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro 2015 года размер L/XL', 'lot-3.jpg', 6000, '2017-12-19 00:00:00', 250, 2, 1, 2),
  ('2017-12-01 00:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда DC Mutiny Charocal', 'lot-4.jpg', 7999, '2017-12-12 00:00:00', 500, 2, 1, 3),
  ('2017-12-01 00:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда DC Mutiny Charocal', 'lot-5.jpg', 8600, '2017-12-15 00:00:00', 250, 3, 2, 4),
  ('2017-12-01 00:00:00', 'Маска Oakley Canopy', 'Маска Oakley Canopy', 'lot-6.jpg', 3200, '2017-12-16 00:00:00', 320, 1, 3, 5);

/*Ставки*/
INSERT INTO bets (create_date, price, author_id, lot_id)
  VALUES ('2017-12-02 00:00:00', 10000, 1, 2),
  ('2017-12-02 00:00:00', 12000, 3, 5);


/*Объединения  */
SELECT lot_id, create_date, name, image_path end_date, author_id, winner_id FROM lots
INNER JOIN users
ON lots.author_id = users.id;

SELECT lot_id, create_date, name, image_path end_date, author_id, winner_id FROM lots
INNER JOIN users
ON lots.winner_id = users.id;

SELECT lot_id, create_date, name, image_path end_date, author_id, winner_id FROM lots
INNER JOIN categories
ON lots.category_id = categories.category_id;

SELECT create_date, price, author_id, lot_id FROM bets
INNER JOIN users
ON bets.author_id = users.id;

SELECT bets.create_date, price, bets.author_id, bets.lot_id FROM bets
INNER JOIN lots
ON bets.lot_id = lots.lot_id;

/*получить список из всех категорий*/

SELECT category_title FROM categories;

/*получить самые новые, открытые лоты*/

SELECT lot_id, create_date, name, image_path end_date, author_id, winner_id FROM lots WHERE DATE(create_date) BETWEEN '2017-12-06 00:00:00' AND NOW();;

/*найти лот по его названию или описанию*/

SELECT lot_id, create_date, name, image_path end_date, author_id, winner_id FROM lots WHERE name = 'Куртка для сноуборда DC Mutiny Charocal';

/*обновить название лота по его идентификатору*/

UPDATE lots SET name = 'Новое название' WHERE lot_id = 2;

/*получить список самых свежих ставок для лота по его идентификатору*/

SELECT * FROM bets WHERE lot_id = 2 ORDER BY create_date DESC;