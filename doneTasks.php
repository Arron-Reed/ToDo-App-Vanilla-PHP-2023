<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>

    <title>Done Tasks</title>
</head>
<body>

<section class="iPhone">

<?php
    include 'crud.php';
?>

<div class="iPhoneScreen">

<div class="iPhoneHeader">
                    <a href="index.php" class="done-tasks">Return to Main Page</a>
                </div>  

    <?php

// Calling if the Delete button is pushed to run 'deleteTask' function 
    if(isset($_GET["deletetaskId"]))
    {
        deleteTask($_GET["deletetaskId"]);
    }

// Calling if the Delete All button is pushed to run 'deleteAll' function 
if(isset($_GET["deleteAll"]))
{
    deleteAll($_GET["deleteAll"]);

    echo '<script>window.location="http://localhost/index.php"</script>';

}    

// Calling if the TaskDone button is pushed to run 'TaskDone' function
    if(isset($_GET["taskUndo"]))
    {
        unMark($_GET["taskUndo"]);

        echo '<script>window.location="http://localhost/index.php"</script>';
    }

// Calling if the Edit button is pushed to run 'edit/update' function

if(isset($_GET["showtaskId"]))
{
    
$task = getTask($_GET["showtaskId"]);

echo '<script>window.location="http://localhost/updateTask.php?showtaskId='.$task["taskId"].'"</script>';

}


    echo("<ul class='deleteTaskContainer'>");

foreach(getAllDoneTasks() as $task)
    {

        print("<li>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='task'>");
        print($task['taskTitle']);
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='description'>");
        print($task['taskDescription']);
        print("</a><div class=buttonBox>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?taskUndo=" . $task["taskId"] . "' class='font'>");
        print("<button type='button' class='done-button'>Undo</button>");
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showtaskId=" . $task["taskId"] . "' class='font'>");
        print("<button type='button' class='edit-button'>Edit</button>");
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?deletetaskId=" . $task["taskId"] . "' class='font'>");
        print("<button type='button' class='remove-button'>Delete</button>");
        print("</a>");

        print("</a></div>");

        print("</li>");
    }
    echo("</ul>");



print("<a href='" . $_SERVER["PHP_SELF"] . "?deleteAll" . "' class='deleteTaskButton'>");
        print("Delete All Tasks");
        print("</a>");
?>

</div>
</section>
</body>
</html>