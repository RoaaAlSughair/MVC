<?php

require_once "../App/Core/DB.php";

class Tasks
{
    private $instance;

    function __construct() {
        $this->instance = DB::getInstance();
    }

    public function GetTasks()
    {
        $stm = $this->instance->conn->prepare("SELECT * FROM habits;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AddTask($task)
    {
        $stm = $this->instance->conn->prepare("INSERT INTO habits (habit) VALUES (:task);");
        $stm->bindValue(":task", $task, PDO::PARAM_STR);
        return $stm->execute();
    }

    public function UpdateTask($id, $task)
    {
        $stm = $this->instance->conn->prepare("UPDATE habits SET habit = :task WHERE habit_id = :id;");
        $stm->bindValue(":task", $task, PDO::PARAM_STR);
        $stm->bindValue(":id", $id, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function DeleteTask($id)
    {
        $stm = $this->instance->conn->prepare("DELETE FROM habits WHERE habit_id = :id;");
        $stm->bindValue(":id", $id, PDO::PARAM_INT);
        return $stm->execute();
    }
}
