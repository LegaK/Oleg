CREATE DATABASE oleg_test;
USE oleg_test;
CREATE TABLE IF NOT EXISTS city (
id SMALLINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL 
);
INSERT INTO city(name) VALUES('Калининград'), ('Москва'), ('Казань');

 CREATE TABLE IF NOT EXISTS `user` (
id INT PRIMARY KEY AUTO_INCREMENT,
firstName VARCHAR(50) CHARACTER SET utf8mb4,
lastName VARCHAR(50) CHARACTER SET utf8mb4, 
city SMALLINT UNSIGNED,
FOREIGN KEY (city)  REFERENCES city (Id) ON UPDATE CASCADE ON DELETE CASCADE
 );
 INSERT INTO user(firstName, lastName, city) VALUES('Евгений', 'Зенцов', 1), ('Лидия', 'Береза', 2), ('Татьяна', 'Кудрявская', 3);
 