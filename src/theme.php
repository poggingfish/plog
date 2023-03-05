<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php echo file_get_contents("style.html") ?>
<body>
<?php
    require("../data/conf/config.php");
    echo "<h1 class=sitename>$Name</h1>";
    function index($views){
        plog_view_count($views);
        echo "<hr><h1 class='post_text'>Posts: </h1>";
    }
    function plog_footer(){
        echo "<div style='position: absolute; bottom: 5px;' class='footer'>Made with <a class='link' href='https://github.com/poggingfish/plog'>plog</a>.</div></body></html>";
    }
    function back_button(){
        echo "<p class='backbutton'><a class='post_link_text' href='/'>Back</a></p>";
    }
    function plog_post(string $poster, string $postname, string $post, string $date){
        echo "<hr>";
        echo "<h1 class=postname>$postname</h1>";
        echo "<p class=byposter>by $poster</p>";
        echo "<div class=posttext>$post</div>";
        echo "<p class=timestamp>$date</p>";
        back_button();
    }
    function plog_post_doesnt_exist(){
        echo "<h1>Sorry, this post doesnt exist.</h1>";
        back_button();
    }
    function plog_view_count(int $views){
        echo "<p class=viewcounter><b>Views: $views</b></p>";
    }
    function plog_post_link($postid, $title, $poster){
        echo "<p class=post_link_text><a class='link' href='view.php/?postid=$postid'>$title</a> by $poster</p>";
    }
?>