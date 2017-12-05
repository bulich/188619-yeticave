CREATE DATABAE yeticave COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE IF NOT EXISTS categories (
  id INT AUTO_INCREMENT PRIMARY KEY
  name CHAR(128)
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATE,
  name CHAR(128),
  message TEXT(500),
  img CHAR(128),
  rate INT,
  end_date DATE,
  step INT,
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (winner_id) REFERENCES users(id),
  FOREIGN KEY (category_id) REFERENCES categories(id),
  is_open INT
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS bets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATE,
  price DECIMAL,
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (lot_id) REFERENCES lots(id)
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date DATE,
  email CHAR(128),
  username CHAR(128),
  pass CHAR(64),
  avatar CHAR(255),
  contacts TEXT(300),
  FOREIGN KEY (lots_id) REFERENCES lots(id),
  FOREIGN KEY (bets_id) REFERENCES bets(id)
) ENGINE=INNODB CHARACTER SET=utf8;

CREATE INDEX lot_id ON lots(id);
CREATE INDEX lot_end ON lots(end_date);
CREATE INDEX bet_id ON bets(id);
CREATE INDEX user_id ON users(id);
CREATE INDEX user_email ON users(email);