<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User(
            $user['nick'],
            $user['email'],
            $user['password']
        );
    }

	public function setUser(string $name, string $email, string $password) {
		$stmt = $this->database->connect()->prepare('
			INSERT IGNORE INTO user(nick, email, password) VALUES (:nick, :email, :password)
		');

		$stmt->bindParam(':nick', $name, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->execute();
	}
}