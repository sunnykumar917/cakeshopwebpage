<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "register";

$conn = mysqli_connect($servername, $username, $password, $database_name);

//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
echo "connected successfully";

//insert data
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    // Check if the username or email already exists
    $sql = "SELECT * FROM registerdata  WHERE name = '$name' OR email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      echo "Username or email already exists.";
    } else {
        if ($password === $cpassword) { // add this condition
            $sql = "INSERT INTO registerdata(name,email,number,password) VALUES('$name','$email','$number','$password')";
            mysqli_query($conn,$sql);
            echo "register successfully";
            header("location: login.php");
            
        } else {
            echo "Password and confirm password do not match.";
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="register" id="register">
        <div class="form-value1">
            <form action="register.php" method="post">
                <h2>Register</h2>
                <div class="inputbox1">
                    <label for="name">NAME:</label><br><br>
                    <input type="text" id="name" name="name" required>   
                </div><br>
                <div class="inputbox1">
                    <label for="email">EMAIL:</label><br><br>
                    <input type="email" name="email" id="email" required>   
                </div>
                <br>
                <div class="inputbox1">
                    <label for="phone">PHONE NO:</label><br><br>
                    <input type="number" id="number" name="number" required>   
                </div>
                
                <br>
                <div class="inputbox1">
                    <label for="Password">PASSWORD:</label><br><br>
                    <input type="password" id="password" name="password" required>   
                </div>
                
                <br>
                <div class="inputbox1">
                    <label for="cPassword">CONFIRM-PASSWORD:</label><br><br>
                    <input type="password" id="cpassword" name="cpassword" required>   
                </div>
                
                <br>
                
                <div class="reg">
                    <button name="signup">sign-up</button>
                </div>
                <div class="login1">
                    <p>Already have an account? <a href="./login.php">sign-in</a></p>

                </div>
            </form>

        </div>
    </section>
    
</body>
</html>




     



