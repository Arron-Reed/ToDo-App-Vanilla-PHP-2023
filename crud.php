<?php


include 'db.php';

// Sanitera inkommande data

function sanitera($input)
{
    return htmlspecialchars(strip_tags($input)); 
}

// Create 

function createTask($taskTitle, $taskDescription, $userId)
{ 
    $conn = prepareDB();

    $taskTitle = sanitera($taskTitle);
    $taskDescription = sanitera($taskDescription);
    $userId = sanitera($userId);

    $query =<<<SQL
    INSERT INTO task (`taskTitle`, `taskDescription`, `taskDone`, `taskDate`, `userId`) 
    VALUES (:taskTitle,	:taskDescription,	0,	NULL,	:userId)
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskTitle", $taskTitle);
        $stmt->bindParam("taskDescription", $taskDescription);
        $stmt->bindParam("userId", $userId);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get one (Read)

function getTask($taskId)
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM task WHERE taskId=:taskId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskId", $taskId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll()[0];
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get all (Read)

function getAllTasks()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM task;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}


// Update one
function updateTask($taskId, $updatetaskTitle, $updatetaskDescription, $updateuserId)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE task
    SET taskTitle=:updatetaskTitle, taskDescription=:updatetaskDescription, userId=:updateuserId
    WHERE taskId=:taskId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskId", $taskId);
        $stmt->bindParam("updatetaskTitle", $updatetaskTitle);
        $stmt->bindParam("updatetaskDescription", $updatetaskDescription);
        $stmt->bindParam("updateuserId", $updateuserId);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}

// Delete one
function deleteTask($taskId)
{
    $conn = prepareDB();

    $query =<<<SQL
    DELETE FROM task WHERE taskId=:taskId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskId", $taskId);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

// Get book-category relation

function getTaskRelation()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT task.taskTitle, task.taskDescription, task.taskDone, task.taskDate, task.userId
    FROM user
    INNER JOIN task
    ON user.userId = task.userId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>