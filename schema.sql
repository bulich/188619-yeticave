CREATE DATABASE yeticave COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE IF NOT EXISTS categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_title VARCHAR(128)
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS lots (
  lot_id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATETIME,
  name VARCHAR(128),
  description TEXT(500),
  image_path VARCHAR(128),
  rate INT,
  end_date DATETIME,
  step INT,
  author_id INT,
  winner_id INT,
  category_id INT
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS bets (
  bet_id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATETIME,
  price DECIMAL,
  author_id INT,
  lot_id INT
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date DATETIME,
  email VARCHAR(128),
  username CHAR(128),
  pass CHAR(64),
  avatar VARCHAR(255),
  contacts TEXT(300)
) ENGINE=INNODB CHARACTER SET=utf8;

ALTER TABLE lots
  ADD FOREIGN KEY (author_id) REFERENCES users(id),
  ADD FOREIGN KEY (winner_id) REFERENCES users(id),
  ADD FOREIGN KEY (category_id) REFERENCES categories(category_id);

ALTER TABLE bets
 ADD FOREIGN KEY (author_id) REFERENCES users(id),
 ADD FOREIGN KEY (lot_id) REFERENCES lots(lot_id);


CREATE INDEX lot_id ON lots(lot_id);
CREATE INDEX lot_end ON lots(end_date);
CREATE INDEX bet_id ON bets(bet_id);
CREATE INDEX user_id ON users(id);
CREATE INDEX user_email ON users(email);