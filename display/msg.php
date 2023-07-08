<?php
require_once('../connect/connect.php');
session_start();

$sql = 'SELECT * FROM posts, pseudo WHERE pseudo.id_pseudo =posts.id_pseudo' ;
$query = $db->prepare($sql);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($posts as $post) {
    echo $post['pseudo'].' says: '.$post['content'].'<br>';
}
if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    $pseudo =$_POST['pseudo'];
    $psw = $_POST['psw'];
    $sql = ("SELECT * FROM `pseudo` WHERE pseudo =:pseudo AND id_users =:id;" );
    $query = $db->prepare($sql);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user ) {
    var_dump($user['pseudo']);
}
}
// if () {
    
// }else {
    
// if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
//     $pdostmnt = $db->prepare('INSERT INTO pseudo(pseudo, id_users) VALUES (:pseudo, :id)');
//     $isSuccess =  $pdostmnt->execute([
//         'pseudo' => $_POST['pseudo'],
//         'id' => $_SESSION['id']
//     ]);

//     $idPseudo = $db->lastInsertId();

//     $pdostmnt = $db->prepare('INSERT INTO posts( content, id_pseudo) VALUES (?,?)');
//     $isSuccess =  $pdostmnt->execute([
//         $_POST['post'],
//         $idPseudo,
//     ]);
// }
// }
// }





// if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
//     $pdostmnt = $db->prepare('INSERT INTO pseudo(pseudo, id_users) VALUES (:pseudo, :id)');
//     $isSuccess =  $pdostmnt->execute([
//         'pseudo' => $_POST['pseudo'],
//         'id' => $_SESSION['id']
//     ]);

//     $idPseudo = $db->lastInsertId();

//     $pdostmnt = $db->prepare('INSERT INTO posts( content, id_pseudo) VALUES (?,?)');
//     $isSuccess =  $pdostmnt->execute([
//         $_POST['post'],
//         $idPseudo,
//     ]);
// }

?>
<!DOCTYPE html>
<div class=msg>
</div>
<form method="post">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo">
    <label for="post">Msg</label>
    <input type="textarea" name="post" id="post">


    <button>Post</button>
</form>



