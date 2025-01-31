<?php

$db = mysqli_connect('mariadb', 'username', 'password', 'database');

$db->query("
CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nick VARCHAR(255),
    email VARCHAR(255),
    password CHAR(64)
)
");

$db->query("
CREATE TABLE IF NOT EXISTS thread (
    thread_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    tags VARCHAR(255),
    score INT,
    views INT,
    content LONGTEXT,
    publish_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
)
");

$db->query("
CREATE TABLE IF NOT EXISTS reply (
    reply_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    thread_id INT,
    content LONGTEXT,
    publish_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (thread_id) REFERENCES thread(thread_id)
)
");

$db->query("
CREATE TRIGGER IF NOT EXISTS before_reply_insert
BEFORE INSERT ON reply
FOR EACH ROW
BEGIN
    SET NEW.publish_date = NOW();
END;
");

$db->query("DROP VIEW IF EXISTS thread_view");
$db->query("DROP VIEW IF EXISTS reply_view");
$db->query("DROP FUNCTION IF EXISTS count_users");

$db->query("
    CREATE VIEW thread_view AS
    SELECT * FROM thread
    NATURAL JOIN user
");

$db->query("
    CREATE VIEW reply_view AS
    SELECT * FROM reply
    NATURAL JOIN user
    NATURAL JOIN thread
");

$db->query("
CREATE FUNCTION count_users() 
RETURNS INT
BEGIN
    DECLARE user_count INT;
    SELECT COUNT(*) INTO user_count
    FROM user;
    RETURN user_count;
END;
");

$db->query("
CREATE TABLE IF NOT EXISTS option (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    option_key VARCHAR(255),
    option_value VARCHAR(255)
)
");

$db->query("
CREATE TABLE IF NOT EXISTS user_option (
    user_option_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    option_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (option_id) REFERENCES option(option_id)
)
");

$db->query("
INSERT IGNORE INTO user (user_id, nick, email, password) VALUES
(1, 'Adrian104', 'a.kulawik8@gmail.com', 'hash')
");

$db->query("
INSERT IGNORE INTO user (user_id, nick, email, password) VALUES
(2, 'Jan Kowalski', 'kowalski@example.com', 'hash')
");

$db->query("
INSERT IGNORE INTO user (user_id, nick, email, password) VALUES
(3, 'User123', 'user123@example.com', 'hash')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(1, 1, 'Który procesor jest lepszy?', '#CPU', 64, 11, 'Który lepszy: R5 9600X czy i5 14600K i dlaczego?', '2023-09-01 14:15:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(2, 3, 'Jak naprawić błąd kompilacji w C++?', '#C++ #programming', 12, 128, 'Uczę się programować i podczas kompilacji wyskakuje błąd segmentation fault.', '2024-07-04 15:30:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(3, 1, 'Co lepsze: float, czy double?', '#C++ #floating-point', 37, 42, 'Czy powinienem stosować typ double czy float w języku C++? Który typ jest lepszy i dlaczego? Nie mogę się zdecydować, bardzo proszę o szczerą odpowiedź.', '2022-02-28 05:20:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(4, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(5, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(6, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(7, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(8, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(9, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO thread (thread_id, user_id, title, tags, score, views, content, publish_date) VALUES
(10, 2, 'Lorem ipsum dolor sit amet', '#lorem #ipsum', 111, 222, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-22 12:00:00')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(1, 2, 1, 'Moim zdaniem procesor i5 14600K jest lepszy.')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(2, 3, 1, 'Moim zdaniem procesor R5 9600X jest lepszy.')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(3, 1, 2, 'Problem z pamięcią - sprawdź, czy nie odczytujesz wartości poza zakresem tablicy lub czy nie używasz pamięci po jej dealokacji.')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(4, 2, 2, 'Spróbuj użyć inteligentnych wskaźników.')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(5, 2, 3, 'Według mnie, lepszy jest float, ponieważ float jest dwa razy mniejszy niż double, przez co więcej zmiennych zmieści się w pamięci')
");

$db->query("
INSERT IGNORE INTO reply(reply_id, user_id, thread_id, content) VALUES
(6, 3, 3, 'Moim zdaniem lepszy jest double, ponieważ double ma znacznie większą dokładność, co może być pomocne przy obliczeniach')
");