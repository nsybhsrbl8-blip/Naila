<?php

include "config.php";


if(isset($_POST['send'])){


$name=$_POST['name'];

$email=$_POST['email'];

$message=$_POST['message'];



$stmt=$conn->prepare(

"INSERT INTO contacts(name,email,message)
VALUES(?,?,?)"

);



if($stmt->execute([$name,$email,$message])){


echo "Message sent successfully";


}


}

?>



<form method="POST">


<input type="text" name="name" placeholder="Name">


<input type="email" name="email" placeholder="Email">


<textarea name="message"></textarea>


<button name="send">
Send
</button>


</form>