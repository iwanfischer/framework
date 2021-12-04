<?php

class ContractsRepository
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM contracts");
        return $statement->fetchAll();
    }

    public function getById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM contracts WHERE id = :id LIMIT 1");

        $statement->execute([
            "id" => $id
        ]);

        return $statement->fetch();
    }

    public function add($agent, $complex, $rewardType, $rewardSize, $validity, $contractDate)
    {
        $this->connection->prepare("INSERT INTO contracts (id, agent, complex, rewardType, rewardSize, validity, contractDate) VALUES (?,?,?,?,?,?,?)")
            ->execute([null, $agent, $complex, $rewardType, $rewardSize, $validity, $contractDate]);
    }
}
