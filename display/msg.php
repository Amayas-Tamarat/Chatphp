<?php
require_once('../connect/connect.php');
$sql = 'SELECT * FROM posts, pseudo WHERE pseudo.id_pseudo = posts.id_pseudo ';
$query = $db->prepare($sql);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($posts as $post) {
    echo $post['pseudo'].$post['content'].'<br>';
}

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



