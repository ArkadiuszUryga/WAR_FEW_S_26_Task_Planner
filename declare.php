<form action="" method="POST">
    <div style="margin: 0 auto; width: 200px;">
        <label>
            Treść zadania
            <textarea name="todo" >

        </textarea>
        </label>
        <br>
        <label>
            Deadline
            <input type="date" name="deadline">
        </label>
        <br>
        <input type="submit" value="Dodaj">
    </div>
</form>

<?php

require ("src/Task.php");
//form dodania taska

if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

    if ( $_POST['todo'] !== "" && $_POST['deadline'] !== "" ){

        $todo = $_POST['todo'];
        $deadline = $_POST['deadline'];

        $task = new Task();
        $task->setTodo($todo);
        $task->setDeadline($deadline);

        $conn = new PDO("mysql:host=localhost;dbname=task; charset=utf8", "task", "task");




        $result = $task->saveToDB($conn);

    }

}

