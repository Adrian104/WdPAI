<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserById($id): ?User
	{
        $stmt = $this->connect()->prepare('
            SELECT * FROM user WHERE user_id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false)
            return null;

        return new User(
            $user['nick'],
            $user['email'],
            $user['password']
        );
    }

	public function getUser(string $email): ?User
	{
        $stmt = $this->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false)
            return null;

        return new User(
            $user['nick'],
            $user['email'],
            $user['password']
        );
    }

    public function getUserId(string $email)
	{
        $stmt = $this->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false)
            return null;

        return $user['user_id'];
    }

	public function setUser(string $name, string $email, string $passwordHash)
	{
		$stmt = $this->connect()->prepare('
			INSERT IGNORE INTO user(nick, email, password) VALUES (:nick, :email, :password)
		');

		$stmt->bindParam(':nick', $name, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();
	}
}