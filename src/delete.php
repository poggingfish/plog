<html>
<body>
<?php require("../data/conf/config.php");?>
<?php
    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('../data/db/blog.db');
        }
    }
    $db = new MyDB();
    $post_id = $_POST["id"];
    $password = $_POST["password"];
    if ($password == $PostPassword){
        $sql =<<<EOF
            DELETE FROM posts WHERE Postid=$post_id; 
        EOF;
        $db->exec($sql);
        echo "Deleted!";
    }
    else{
        echo "Wrong password!";
    }
?>
</html>
</body>