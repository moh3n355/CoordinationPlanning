CREATE DATABASE test
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE test;

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    password VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    0shanbe INT(11) NOT NULL DEFAULT 0,
    1shanbe INT(11) NOT NULL DEFAULT 0,
    2shanbe INT(11) NOT NULL DEFAULT 0,
    3shanbe INT(11) NOT NULL DEFAULT 0,
    4shanbe INT(11) NOT NULL DEFAULT 0,
    5shanbe INT(11) NOT NULL DEFAULT 0,
    6shanbe INT(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users (id, name, password, 0shanbe, 1shanbe, 2shanbe, 3shanbe, 4shanbe, 5shanbe, 6shanbe) VALUES
(1, 'moh3n',  '123',   2, 2, 1, 1, 2, 2, 1),
(2, 'iliya',  '456',   1, 1, 1, 1, 1, 1, 1),
(5, 'emad',   '8520',  0, 2, 1, 2, 0, 1, 1),
(9, 'mammad', '753',   0, 0, 0, 0, 0, 0, 0),
(11,'mohsen', '3443',  0, 0, 0, 0, 0, 0, 0),
(12,'seyed',  '8520',  2, 1, 2, 1, 2, 2, 0);

CREATE TABLE admins (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
    password VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admins (name, password) VALUES ('mohsen', '7410');
