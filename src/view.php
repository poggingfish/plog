<?php require("header.php")?>
<?php
    $db = new PDO("sqlite:../data/db/blog.db");
    $postid = $_GET["postid"];
    $post = $db->prepare('SELECT * FROM posts WHERE Postid = ? ;');
    $post->execute(array($postid));
    $count = 0;
    $result = $post->fetchAll();
    foreach($result as $row) {
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
<?php require("footer.php");?>