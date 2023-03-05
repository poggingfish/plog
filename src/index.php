<?php require("theme.php")?>
<?php
    $init = false;
    if (!file_exists("../data/db/blog.db")){
        $init = true;
    }
    class MyDB extends SQLite3 {
        function __construct() {
            $this->open('../data/db/blog.db');
        }
    }
    $db = new MyDB();
    if ($init){
        // Initialize the DB!!
        echo "<p>Initializing the databse. Please wait</p>";
        flush();
        $postsinit = <<<EOF
        CREATE TABLE "posts" (
            "Postid"	INTEGER,
            "Posttitle"	varchar(100),
            "Post"	varchar(2500),
            "Poster"	varchar(50),
            "Date"	varchar(100),
            PRIMARY KEY("Postid" AUTOINCREMENT)
        )
        EOF;
        $db->exec($postsinit);
        echo "<p>Created posts table</p>";
        flush();
        $viewsinit = <<<EOF
        CREATE TABLE "views" (
            "views"	integer
        );
        INSERT INTO views (views) VALUES(0);
        EOF;
        $db->exec($viewsinit);
        echo "<p>Created views table</p>";
        flush();
        echo "<p>Initialized</p>";
        flush();
    }
    // Update views
    $sql = <<<EOF
    UPDATE views SET views = views + 1;
    EOF;
    $db->exec($sql);
    // Get views
    $sql = <<<EOF
    SELECT views FROM views;
    EOF;
    $views = $db->querySingle($sql);
    index($views);
    // Get posts
    $sql = <<<EOF
        SELECT Posttitle, Postid, Poster FROM posts ORDER BY Postid DESC;
    EOF;
    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        $postid = $row["Postid"];
        plog_post_link($postid,$row["Posttitle"], $row["Poster"]);
    }
    $db->close();
    plog_footer();
?>