<?php require("header.php")?>
<?php
    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('blog.db');
        }
    }
    $db = new MyDB();
    $postid = $_GET["postid"];
    $post = $db->query("SELECT * FROM posts WHERE Postid=$postid;");
    $count = 0;
    while($row = $post->fetchArray(SQLITE3_ASSOC)) {
        echo "<h3>Viewing post: ".$row["Posttitle"]."</h3>";
        echo "<p>By ".$row["Poster"]."</p>";
        echo "<p>".$row["Date"]." CST</p>";
        echo "<hr>";
        echo "<h2>".$row["Post"]."</h2>";
        $count++;
    }
    if ($count==0){
        echo "<h3>This post doesnt exist!!</h3>";
    }
    echo "<a class='postlink' href='/'>Back</a>";
?>
<?php echo require("footer.php");?>