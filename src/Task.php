<?php

class Task {

    private $id;
    private $todo;
    private $done;
    private $deadline;

    public function __construct()
    {
        $this->id = -1;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTodo()
    {
        return $this->todo;
    }

    /**
     * @param mixed $todo
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;
    }

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @param mixed $done
     */
    public function setDone($done)
    {
        $this->done = $done;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    public function saveToDB(PDO $conn ){

        $sql = "INSERT INTO `Tasks`( `todo`, `deadline`) VALUES (:todo,:deadline);";

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['todo'=> $this->todo,  'deadline' => $this->deadline]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        if ( $result == TRUE ){
            $this->id = $conn->lastInsertId();
        }else {
            var_dump($conn->errorInfo());
            var_dump($conn->errorCode());
        }

        return $result;
    }

}