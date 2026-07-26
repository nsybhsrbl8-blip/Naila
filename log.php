<?php

session_start();

include "config.php";


if(isset($_POST['login'])){


$email=$_POST['email'];

$password=$_POST['password'];



$stmt=$conn->prepare(
"SELECT * FROM users WHERE email=?"
);


$stmt->execute([$email]);


$user=$stmt->fetch();



if($user && password_verify($password,$user['password'])){


$_SESSION['user_id']=$user['id'];

$_SESSION['name']=$user['name'];


echo "Login successful";


}else{


echo "Wrong email or password";


}


}

?>



<form method="POST">


<input type="email" name="email" placeholder="Email">


<input type="password" name="password" placeholder="Password">


<button name="login">
Login
</button>


</form>