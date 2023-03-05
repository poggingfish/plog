<?php require("header.php")?>
<h3>Make a post: </h3>
<form action="post.php" method="post">
    Password:<br> <input type="password" name="password">
    <br>
    Name:<br> <input type="text" name="name">
    <br>
    Post title:<br> <input type="text" name="post_title">
    <br>
    Post:<br> <textarea rows="10" cols="25" name="post"></textarea>
    <br>
    <input type="submit">
</form>
<?php echo require("footer.php");?>