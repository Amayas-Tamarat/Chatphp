<?php
require_once('connect.php');
?>

<!DOCTYPE html>
<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="psw">password</label>
    <input type="text" name="psw" id="psw">


    <button>Connect</button>
</form>

<?php 
session_start();
if(isset($_POST['username']) && !empty($_POST['psw'])){
$username =$_POST['username'];
$psw = $_POST['psw'];
$sql = ("SELECT * FROM users WHERE psw ='$psw' AND username ='$username'");
$query = $db->prepare($sql);
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);
if ($users == true) {
 foreach ($users as $user )
 $_SESSION['id'] = $user['id_users'];
 echo $user['username'].$_SESSION['id'];
} else {
   echo 'erreur';
}
}




