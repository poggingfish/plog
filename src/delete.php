<html>
<body>
<?php require("../data/conf/config.php");?>
<?php
    $db = new PDO("sqlite:../data/db/blog.db");
    $post_id = $_POST["id"];
    $password = $_POST["password"];
    if ($password == $PostPassword){
        $sql =<<<EOF
            DELETE FROM posts WHERE Postid=?; 
        EOF;
        $statement = $db->prepare($sql);
        $statement->execute($post_id);
        echo "Deleted!";
    }
    else{
        echo "Wrong password!";
    }
?>
</html>
</body>