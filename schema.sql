CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE categories (
  name CHAR(128) PRIMARY KEY
);

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATE,
  name CHAR(128),
  message TEXT(500),
  img CHAR(128),
  rate INT,
  end_date DATE,
  step INT,
  author_id INT,
  winner_id INT,
  category_name CHAR(128),
  is_open INT
);

CREATE TABLE bet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  create_date DATE,
  price INT,
  author_id INT,
  lot_id INT
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date DATE,
  email CHAR(128),
  username CHAR(128),
  pass CHAR(255),
  avatar CHAR(255),
  contacts TEXT(300),
  lots_id CHAR(128),
  bets_id CHAR(128)
);

CREATE INDEX lot_id ON lot(id);
CREATE INDEX lot_end ON lot(end_date);
CREATE INDEX bet_id ON bet(id);
CREATE INDEX user_id ON users(id);
CREATE INDEX user_email ON users(email);