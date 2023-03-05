<html>
<body>
<?php require("config.php");?>
<?php
    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('blog.db');
        }
    }
    $db = new MyDB();
    $post_title = $_POST["post_title"];
    $post = $_POST["post"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $date = time();
    $dt = new DateTime("@$date");
    $pretty = $dt->format('Y-m-d H:i:s');
    if ($password == $PostPassword){
        $sql =<<<EOF
            INSERT INTO posts (Posttitle, Post, Poster, Date) VALUES("$post_title", "$post", "$name", "$pretty"); 
        EOF;
        $db->exec($sql);
        echo "Posted!";
    }
    else{
        echo "Wrong password!";
    }
?>
</html>
</body>