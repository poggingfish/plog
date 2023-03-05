<html>
<body>
<?php require("../data/conf/config.php");?>
<?php
    $db = new PDO("sqlite:../data/db/blog.db");
    $post_title = $_POST["post_title"];
    $post = $_POST["post"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $date = time();
    $dt = new DateTime("@$date");
    $pretty = $dt->format('Y-m-d H:i:s');
    if ($password == $PostPassword){
        $sql =<<<EOF
            INSERT INTO posts (Posttitle, Post, Poster, Date) VALUES(?, ?, ?, ?); 
        EOF;
        $statement = $db->prepare($sql);
        $statement->execute([$post_title,$post,$name,$pretty]);
        echo "Posted!";
    }
    else{
        echo "Wrong password!";
    }
?>
</html>
</body>