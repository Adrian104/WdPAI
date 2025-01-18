<?php

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

?>
