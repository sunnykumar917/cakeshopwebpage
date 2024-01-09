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

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
    
    
	// Check if email and password exist in the database
	$sql = "SELECT * FROM registerdata WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0 ) {
		echo "Login successful";
        header("location: index.html");
	} else {
		echo "Invalid email or password";
	}

	mysqli_close($conn);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="login" id="login">
        <div class="form-value">
            <form action="login.php" method="post">
                <h2>login</h2>
                <div class="inputbox">
                    <label for="">Email:</label><br><br>
                    <input type="email" name="email" required>   
                </div>
                <div class="inputbox">
                    <label for="">Password:</label><br><br>
                    <input type="password" name="password" required>   
                </div>
                <br>
                <div class="forget">
                    <label for=""><input type="checkbox" name="c-box"></label>
                    <a href="">Forget Password</a>
                </div>
                <br>
                <div class="log">
                    <button name="login">Log in</button>
                </div>
                <div class="Regis">
                    <p>Don't have an account? <a href="./register.php">Register</a></p>

                </div>
            </form>

        </div>
    </section>

</body>
</html>