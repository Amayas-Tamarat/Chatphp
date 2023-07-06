<?php

require_once('connect.php');

?>
<!DOCTYPE html>
<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="psw">password</label>
    <input type="text" name="psw" id="psw">


    <button>Enregistrer</button>
</form>

<?php


if(isset($_POST)){
    if(
        isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['psw']) && !empty($_POST['psw'])
        ){
            $username = strip_tags($_POST['username']);
            $psw = strip_tags($_POST['psw']);

            $sql = "INSERT INTO `users` ( `username`, `psw`) 
            VALUES ( :username, :psw);";

            $query = $db->prepare($sql);

            $query->bindValue(':username', $username, PDO::PARAM_STR);
            $query->bindValue(':psw', $psw, PDO::PARAM_STR);


            $query->execute();
            header('Location: ../index.php');
            
        }  
  

}

