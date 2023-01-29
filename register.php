<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
<section class="iPhone">

<?php
    include 'crud.php';
    ?>
    
    <div class="updateiPhoneScreen">

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="register-form">
            <label for="inputTitle">Username:</label><br>
            <input type="text" name="userName" id="inputuserName" class="gap"><br>
            <label for="inputPassword">Password:</label><br>
            <input type="password" name="userPassword" id="inputPassword" class="gap"><br>
            <input type="submit" value="Add User" class="add">
        </form>
    </div>
    
    
        <?php
        if(isset($_POST["userName"])){
            createUser($_POST["userName"], $_POST["userPassword"]);

        }
    
        ?>
  
  <a href="home.php" class="return">Return to Main Page >>></a>
    
</div>
    </section>
    </body>
    </html>