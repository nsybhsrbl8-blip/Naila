<?php

include "config.php";


if(isset($_POST['register'])){


$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);



$sql = "INSERT INTO users(name,email,password)
VALUES(?,?,?)";


$stmt = $conn->prepare($sql);


if($stmt->execute([$name,$email,$password])){

echo "Account created successfully";

}else{

echo "Registration failed";

}


}

?>


<form method="POST">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">


<button name="register">
Register
</button>


</form>