<?php

const HOST = 'mariadb';
const USERNAME = 'username';
const PASSWORD = 'password';
const DATABASE = 'database';

require_once 'Init.php';

class Repository
{
	private $host;
    private $username;
    private $password;
    private $database;

	public function setup()
	{
		$db = mysqli_connect($this->host, $this->username, $this->password, $this->database);

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
	}

	public function connect()
	{
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->database;charset=UTF8",
                $this->username,
                $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

	public function __construct()
    {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
		$this->setup();
    }
}