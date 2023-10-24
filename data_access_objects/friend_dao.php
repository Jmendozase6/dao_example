<?php
require_once '../datasource/connection.php';

class FriendDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function getFriends()
    {
        $sql = /** @lang text */
            "SELECT * FROM friends";
        $table = $this->conn->prepare($sql);
        $table->execute();
        return $table->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFriendById($id)
    {
        $sql = /** @lang text */
            "SELECT * FROM friends WHERE id = ?";
        $table = $this->conn->prepare($sql);
        $table->bindParam(1, $id);
        $table->execute();
        return $table->fetch(PDO::FETCH_ASSOC);
    }

    public function addFriend(FriendDTO $friendDTO)
    {
        $paternalLastName = $friendDTO->getPaternalLastName();
        $maternalLastName = $friendDTO->getMaternalLastName();
        $name = $friendDTO->getName();

        $sql = /** @lang text */
            "INSERT INTO friends (paternalLastName, maternalLastName, name) VALUES (?, ?, ?)";
        $table = $this->conn->prepare($sql);
        $table->bindParam(1, $paternalLastName);
        $table->bindParam(2, $maternalLastName);
        $table->bindParam(3, $name);
        $table->execute();
    }

    public function updateFriend(FriendDTO $friendDTO)
    {
        $paternalLastName = $friendDTO->getPaternalLastName();
        $maternalLastName = $friendDTO->getMaternalLastName();
        $name = $friendDTO->getName();
        $id = $friendDTO->getId();

        $sql = /** @lang text */
            "UPDATE friends SET paternalLastName = ?, maternalLastName = ?, name = ? WHERE id = ?";
        $table = $this->conn->prepare($sql);
        $table->bindParam(1, $paternalLastName);
        $table->bindParam(2, $maternalLastName);
        $table->bindParam(3, $name);
        $table->bindParam(4, $id);
        $table->execute();
    }

    public function deleteFriend($id = 0)
    {
        $sql = /** @lang text */
            "DELETE FROM friends WHERE id = ?";
        $table = $this->conn->prepare($sql);
        $table->bindParam(1, $id);
        $table->execute();
    }
}

$friendDAO = new FriendDAO();