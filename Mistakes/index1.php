<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>
</head>
<body>
<section class="iPhone">
<?php
    include 'crud.php';
?>

<?php
/*

error_reporting(0);


$saved_username = "oliver";
$saved_password = "1234";

$saved_username = "arron";
$saved_password = "5678";

$saved_username = "maria";
$saved_password = "98746";

$input_username = $_POST["username"];
$input_password = $_POST["password"];


if ($input_username == $saved_username && $input_password == $saved_password)
{
    echo "Hej Oliver";
}

else
{
    echo "Login Failed";
}

echo "Vi har mottagit:<br>";
echo "Username: ".$username."<br>";
echo "Password: ".$password."<br>";
*/
?>

    <h1>Hello there!</h1>

<div class="box">
    <h2>Add a new task</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="inputTitle">Task:</label><br>
        <input type="text" name="taskTitle" id="inputTitle"><br>
        <label for="inputDescription">Description:</label><br>
        <input type="text" name="taskDescription" id="inputDescription"><br>
        <label for="inputUser">User:</label><br>
        <input type="text" name="userId" id="inputUser"><br>
        <input type="submit" value="Add task">
    </form>
</div>

<a href="index2.php" class="bull"> Link to another page </a>

   
<div class="dogs">
    <h2>Tasks</h2>

    <?php

    if(isset($_GET["deletetaskId"]))
    {
        deleteTask($_GET["deletetaskId"]);
    }

    echo("<ul>");
    foreach(getAllTasks() as $task)
    {
        print("<li>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='chicken'>");
        print($task['taskTitle']);
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?taskDone=" . $task["taskId"] . "' class='done-button'>");
        print("Mark as done");
        print("</a>");
        print(" - ");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?deletetaskId=" . $task["taskId"] . "' class='potato'>");
        print("[remove]");
        print("</a>");
        print("</li>");
    }
    echo("</ul>");

    ?>
</div>
    <?php
    if(isset($_GET["showtaskId"]))
    {

        
$task = getTask($_GET["showtaskId"]);

echo '<script>window.location="http://localhost/updateTask.php?showtaskId='.$task["taskId"].'"</script>';

        print("<h2>Selected Task</h2>");
    ?>
       
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="updatetaskTitle">Task:</label><br>
        <input type="text" name="updatetaskTitle" id="updatetaskTitle" value="<? print($task["taskTitle"]) ?> "><br>
        <label for="updatetaskDescription">Description:</label><br>
        <input type="text" name="updatetaskDescription" id="updatetaskDescription" value="<? print($task["taskDescription"]) ?> "><br>
        <label for="updateuserId">User nr:</label><br>
        <input type="text" name="updateuserId" id="updateuserId" value="<? print($task["userId"]) ?> "><br>
        <input type="hidden" name="updatetaskId" value="<? print($_GET["showtaskId"]) ?>"><br>
        <input type="submit" value="Update task">
    </form>

    <?php
    }
    ?>

    <?php
    if(isset($_GET["taskDone"]))
    {
        markAsDone($_GET["taskDone"]);

        print("<h2>TaDa</h2>");
    }
    ?>
    

<?php

    //GET RELATIONS

    echo "<h2>Task-kategorirelation</h2>";
    echo("<ul>");
    foreach(getTaskRelation() as $task)
    {
        print("<li>");
        print($task['taskTitle']);
        print(" - ");
        print($task['userId']);
        print("</li>");
    }
    echo("</ul>");

    ?>

</section>
</body>
</html>