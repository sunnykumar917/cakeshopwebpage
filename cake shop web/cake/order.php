<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "order";

$conn = mysqli_connect($servername, $username, $password, $database_name);

//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
echo "connected successfully";

//insert data
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $ctype= $_POST['ctype'];
    $qty = $_POST['qty'];
    $address=$_POST['address'];
    
    
    $sql = "INSERT INTO orderdetail(name,email,number,ctype,qty,address) VALUES('$name','$email','$number','$ctype','$qty','$address')";
    mysqli_query($conn,$sql);
    echo "<script>alert('your order confirmed');</script>";

    
    
    
    
    // Close the database connection
    mysqli_close($conn);
}
?>