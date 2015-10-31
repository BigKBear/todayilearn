<?php
    require_once('application.php');
    $app = new Application($_POST);
?>
<pre>
    <?php
        var_dump ($_POST);
        var_dump($app);
    ?>
</pre>
Welcome <?php echo $app->getArrayFromRequest()["username"]; ?><br>
You just added story:<?php echo $app->getArrayFromRequest()["post"]; ?>