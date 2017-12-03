/* Категории */
INSERT INTO categories VALUES 
('Доски и лыжи'),
('Крепления'),
('Ботинки'),
('Одежда'),
('Разное'),
('Инструменты');

/* Пользователи*/
INSERT INTO users SET
  reg_date = '2017-08-08',
  email = 'ignat.v@gmail.com',
  username = 'Игнат',
  pass = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka',
  avatar = 'img/user.jpg',
  contacts = 'ignat.v@gmail.com',
  lots_id = 0,
  bets_id = 0;

INSERT INTO users SET
  reg_date = '2017-10-02',
  email = 'kitty_93@li.ru',
  username = 'Леночка',
  pass = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
  avatar = 'img/user.jpg',
  contacts = 'kitty_93@li.ru',
  lots_id = 0,
  bets_id = 0;

INSERT INTO users SET
  reg_date = '2017-05-15',
  email = 'warrior07@mail.ru',
  username = 'Руслан',
  pass = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',
  avatar = 'img/user.jpg',
  contacts = 'kitty_93@li.ru',
  lots_id = 0,
  bets_id = 0;

/* Лоты*/
INSERT INTO lot SET
  create_date = '2017-12-01',
  name = '2014 Rossignol District Snowboard',
  message = '2014 Rossignol District Snowboard',
  img = 'lot-1.jpg',
  rate = 10000,
  end_date = '2017-12-21',
  step = 1000,
  author_id = 1,
  winner_id = 2,
  category_name = 'Доски и лыжи',
  is_open = 1;

INSERT INTO lot SET
  create_date = '2017-12-01',
  name = 'DC Ply Mens 2016/2017 Snowboard',
  message = 'DC Ply Mens 2016/2017 Snowboard',
  img = 'lot-2.jpg',
  rate =5000,
  end_date = '2017-12-30',
  step = 500,
  author_id = 2,
  winner_id = 0,
  category_name = 'Доски и лыжи',
  is_open = 1;

INSERT INTO lot SET
  create_date = '2017-12-01',
  name = 'Крепления Union Contact Pro 2015 года размер L/XL',
  message = 'Крепления Union Contact Pro 2015 года размер L/XL',
  img = 'lot-3.jpg',
  rate = 6000,
  end_date = '2017-12-19',
  step = 250,
  author_id = 0,
  winner_id = 1,
  category_name = 'Крепления',
  is_open = 1;

INSERT INTO lot SET
  create_date = '2017-12-01',
  name = 'Ботинки для сноуборда DC Mutiny Charocal',
  message = 'Ботинки для сноуборда DC Mutiny Charocal',
  img = 'lot-4.jpg',
  rate = 7999,
  end_date = '2017-12-12',
  step = 500,
  author_id = 2,
  winner_id = 1,
  category_name = 'Ботинки',
  is_open = 1;

INSERT INTO lot SET
  create_date = '2017-12-01',
  name = 'Куртка для сноуборда DC Mutiny Charocal',
  message = 'Куртка для сноуборда DC Mutiny Charocal',
  img = 'lot-5.jpg',
  rate = 8600,
  end_date = '2017-12-15',
  step = 250,
  author_id = 0,
  winner_id = 2,
  category_name = 'Одежда',
  is_open = 1;

INSERT INTO lot SET
  create_date = '2017-12-01',
  name = 'Маска Oakley Canopy',
  message = 'Маска Oakley Canopy',
  img = 'lot-6.jpg',
  rate = 3200,
  end_date = '2017-12-16',
  step = 340,
  author_id = 1,
  winner_id = 0,
  category_name = 'Разное',
  is_open = 1;


/*Ставки*/
INSERT INTO bet SET
  create_date = '2017-12-02',
  price = 10000,
  author_id = 1,
  lot_id = 2;

INSERT INTO bet SET
  create_date = '2017-12-02',
  price = 12000,
  author_id = 0,
  lot_id = 5;

/*Объединения*/
SELECT lot.id, lot.author_id FROM lot
JOIN users
ON lot.author_id = users.id;

SELECT lot.id, lot.winner_id FROM lot
JOIN users
ON lot.winner_id = users.id;

SELECT lot.id, lot.category_name FROM lot
JOIN categories
ON lot.category_name = categories.name;

SELECT bet.id, bet.author_id FROM bet
JOIN users
ON bet.author_id = users.id;

SELECT bet.id, bet.lot_id FROM bet
JOIN lot
ON bet.lot_id = lot.id;

/*получить список из всех категорий*/

SELECT * FROM categories;

/*получить самые новые, открытые лоты*/

SELECT * FROM lot WHERE is_open = 1;

/*найти лот по его названию или описанию*/

SELECT * FROM lot WHERE name = 'Куртка для сноуборда DC Mutiny Charocal';

/*обновить название лота по его идентификатору*/

UPDATE lot SET name = 'Новое название' WHERE id = 2;

/*получить список самых свежих ставок для лота по его идентификатору*/

SELECT * FROM bet WHERE lot_id = 2 ORDER BY create_date DESC;