<?php


include 'db.php';

// Sanitera inkommande data

function sanitera($input)
{
    return htmlspecialchars(strip_tags($input)); 
}


// Add User (Login) 

function createUser($userName, $userPassword)
{ 
    $conn = prepareDB();

    $userName = sanitera($userName);
    $userPassword = sanitera($userPassword);

    $query =<<<SQL
    INSERT INTO user (`userName`, `userPassword`) 
    VALUES (:userName,	:userPassword)
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("userName", $userName);
        $stmt->bindParam("userPassword", $userPassword);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}




// Create 

function createTask($taskTitle, $taskDescription, $taskDone, $userId)
{ 
    $conn = prepareDB();

    $taskTitle = sanitera($taskTitle);
    $taskDescription = sanitera($taskDescription);
    $taskDone = sanitera($taskDone);
    $userId = sanitera($userId);

    $query =<<<SQL
    INSERT INTO task (`taskTitle`, `taskDescription`, `taskDone`, `taskDate`, `userId`) 
    VALUES (:taskTitle,	:taskDescription, :taskDone,	NOW(),	:userId)
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskTitle", $taskTitle);
        $stmt->bindParam("taskDescription", $taskDescription);
        $stmt->bindParam("taskDone", $taskDone);
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


// Get One User (Read)

function getUser($userName)
{
    
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM user WHERE userName=:userName;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("userName", $userName);
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
    SELECT * FROM task WHERE taskDone=0;
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


// Get all Completed Tasks (Read)

function getAllDoneTasks()
{
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM task WHERE taskDone=1;
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
function updateTask($taskId, $updatetaskTitle, $updatetaskDescription, $updatetaskDone, $updateuserId)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE task
    SET taskTitle=:updatetaskTitle, taskDescription=:updatetaskDescription, taskDone=:updatetaskDone, userId=:updateuserId
    WHERE taskId=:taskId;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskId", $taskId);
        $stmt->bindParam("updatetaskTitle", $updatetaskTitle);
        $stmt->bindParam("updatetaskDescription", $updatetaskDescription);
        $stmt->bindParam("updatetaskDone", $updatetaskDone);
        $stmt->bindParam("updateuserId", $updateuserId);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}

// Mark as Done

function markAsDone($taskId)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE task
    SET taskDone=1
    WHERE taskId=:taskId;
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


// Unmark as Done

function unMark($taskId)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE task
    SET taskDone=0
    WHERE taskId=:taskId;
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

// Delete
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


// Delete All
function deleteAll($taskDone)
{
    $conn = prepareDB();

    $query =<<<SQL
    DELETE FROM task WHERE taskDone=1;
    SQL;

    try {
        $stmt = $conn->prepare($query);
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