<?php require("theme.php")?>
<?php
    $db = new PDO("sqlite:../data/db/blog.db");
    $postid = $_GET["postid"];
    $post = $db->prepare('SELECT * FROM posts WHERE Postid = ? ;');
    $post->execute(array($postid));
    $count = 0;
    $result = $post->fetchAll();
    foreach($result as $row) {
        plog_post($row["Poster"],$row["Posttitle"], $row["Post"], $row["Date"]);
        $count++;
    }
    if ($count==0){
        plog_post_doesnt_exist();
    }
?>
<?php plog_footer();?>