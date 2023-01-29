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

    if (isset($_POST['login'])) 
    {
        getUser($_GET["userName"]);
    
    
        if (!$result) {
            echo '<p class="error">Username password combination is wrong! First match</p>';
        } 
        
        else {
            
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } 
            
            else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
 
    }
?>
<?php
/*    
    <div class="updateiPhoneScreen">

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="register-form">
            <label for="inputTitle">Username:</label><br>
            <input type="text" name="userName" id="inputuserName" class="gap"><br>
            <label for="inputPassword">Password:</label><br>
            <input type="password" name="userPassword" id="inputPassword" class="gap"><br>
            <input type="submit" value="Add User" class="add">
        </form>
    </div>
    
 /*
   
        <?php
        if(isset($_POST["userName"])){
            createUser($_POST["userName"], $_POST["userPassword"]);

        }
           */    
        ?>

<form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="userName" pattern="[a-zA-Z0-9]+" required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="userPassword" required />
  </div>
  <button type="submit" name="login" value="login">Log In</button>
</form>


  <a href="home.php" class="return">Return to Main Page >>></a>
    
</div>
    </section>
    </body>
    </html>