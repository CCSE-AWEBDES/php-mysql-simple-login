<?php
    session_start();

    require("connection.php");
    
    if (isset($_COOKIE['username']) != null) { //check if user is already logged in
        header("location: main.php");
    }else{
        if (isset($_POST['btn_submit'])){

            //Get the inputted username and password
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM tblaccounts WHERE username = '$username'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 1) { //Check if there is a record found using the username inputted
                $row = mysqli_fetch_assoc($result);
                
                if ($password == $row['password']) {//Check if password is correct
                    setcookie('username', $username ,time() + 1000000); //Create a Cookie
                    header('location: main.php');
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "User not found.";
            }
            
            
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login Page</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
       
        <h3>Login</h3>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="username" required />
            <br/>
            <input type="password" name="password" placeholder="password" required/>
            <br/>
            <input type="submit" name="btn_submit" value="Login"/>
        </form>

      
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
