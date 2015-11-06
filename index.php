<?php
    require_once('application.php');
    $app = new Application($_POST);
    session_start();
    array_push($_SESSION, $_POST['username']);
    array_push($_SESSION, $_POST['post']);
     
    $_SESSION["user"] = $_POST['username'];
    $_SESSION["learnt"]= $_POST['post'];
    
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_SESSION);
//  var_dump($_SERVER);

?>
<title>ToDo App single page</title>
<h4>Below shows all the current data</h4>
<!--Read data from a file that saves a username and a post untill the end of the file is reached-->
Welcome back <?php echo $_SESSION["user"]; ?> <?php echo $_SESSION["learnt"]; ?><br>

<h4>Add the form to the post above</h4>
<button id=""><a href="index.php?id=new">Add</a></button>
<?php
    if((isset($_GET['id']))||(strpos($_SERVER["REQUEST_URI"],'/edit') !== false)){
?>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="<?php if((isset($_POST['username']))){echo htmlentities($_POST['username']); echo $_SESSION['user'];}else {?>Username...<?php } ?>" ><br><br>
        <textarea rows="4" cols="50" name="post" placeholder="<?php if((isset($_POST['post']))){ echo htmlentities($_POST['post']); echo $_SESSION['learnt'];}else{?>Tell us what you learned...<?php } ?>"></textarea>
        <br>
        <input name="submit" type="submit">
    </form>
    <?php
        if((isset($_POST))&& (count($_POST))){
            $_SESSION["user"] = $_POST['username'];
            $_SESSION["learnt"]= $_POST['post'];
            //write the data to the data.txt file on a new line
        }
    } 
    ?>

<h4>Update what is currently posted</h4>
Welcome <?php echo $_POST["username"]; ?><br>
You just added story:<?php echo $_POST["post"]; ?><br>
<button id=""><a href="index.php?id=$_GET['id']/edit">Edit</a></button>
<?php
    //session_unset();
    //session_destroy();
?>