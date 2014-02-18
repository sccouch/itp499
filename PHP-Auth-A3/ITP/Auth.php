<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 2/11/14
 * Time: 6:47 PM
 */

namespace ITP;

class Auth {

    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function attempt($username, $password) {
        $user = $this->getUser($username);
        if (!is_null($user)) {
            return $user["password"] == sha1($password);
        } else {
            return false;
        }
    }

    public function getUser($username) {
        $sql = "SELECT *
                FROM users
                WHERE username=?";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $username);

        $statement->execute();
        $result = $statement->fetchAll();

        if (count($result) > 0)
            return $result[0];
        else
            return null;
    }
}