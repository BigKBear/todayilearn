<?php
    require_once('application.php');
    $app = new Application($_POST);
    session_start();
    
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_SESSION);
    var_dump($_SERVER);
?>
<h4>Add the form to the post</h4>
<button id=""><a href="index.php?id=new">Add</a></button>
<?php if((isset($_GET['id']))||(strpos($_SERVER["REQUEST_URI"],'/edit') !== false)){?>
<form action="index.php" method="post">
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username..."><br><br>
        <textarea rows="4" cols="50" name="post" placeholder="Tell us what you learned..."></textarea>
        <br>
        <input name="submit" type="submit">
    </form>
 <?php
 if(isset($_POST['submit'])){
     $_SESSION["user"]= $_POST['username'];
     $_SESSION["learnt"]= $_POST['post'];
 }
     
    } ?>

<h4>Update what is currently posted</h4>
Welcome <?php echo $app->getArrayFromRequest()["username"]; ?><br>
You just added story:<?php echo $app->getArrayFromRequest()["post"]; ?><br>
<button id=""><a href="index.php?id=$_GET['id']/edit">Edit</a></button>
<?php
    //session_unset();
?>
