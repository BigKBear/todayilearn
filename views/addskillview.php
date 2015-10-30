<?php

if(isset($_POST['submit_slill'])){
    $data_missing = array();
    
    if((empty($_POST['screenname']))||(empty($_POST['skill_learned']))){
        $data_missing[]='Screen Name';
        $data_missing[]='Skill Learned';
    }else{
        $screen_name = trim($POST['screenname']);
        $screen_name = trim($POST['skill_learned']);
    }
    
    if(empty($data_missing)){
        require_once('../database_class.php');
        
        $insertskill = 'INSERT INTO lerntdetails (description, skills_id,t_down,t_up)
                VALUES (:skill_learned,:screenname, :learned)';
    }
}

  /*  //if form was submitted getLerntDetails <-- "Lernt" is German! Learnt is English
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($conn)) {
            try {
                $sql = "INSERT INTO lerntdetails (Screenname, Learned)
                VALUES (:screenname, :learned)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':screenname',$_POST['screenname']);
                $stmt->bindParam(':learned',$_POST['learned']);
                
                $learned_item_result = $stmt->execute();
            } catch(PDOException $e) {
                $learned_item_error = $e->getMessage();
            }
        }
    }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($learned_item_result) {
                    $type = 'success';
                    $msg = '<strong>Congrats!</strong> You\'ve lernt a new skill.';
                } else {
                    $type = 'danger';
                    $msg = '<strong>Oops!</strong> An error has occurred please add your skill later(1hr). <br/>';
                    $msg .= $learned_item_error;
                }
                
                echo '<div class="alert alert-'.$type.'" role="alert">'.$msg.'</div>';
                
                if ($learned_item_result) {
                    echo '<div class="alert text-center"><a href="/index.php" class="btn btn-success">Add Item</a></div>';
                }
            }
*/
    
/*
<!--
search forms to see the different type of syntax can be used on the form
<form action ="form.php" method="post">
need a name so that we can store the name like a key so that they can be stored in the db
-->*/
echo'
    <form role="form" method="POST" action="">
        <br>
        <input id="screenname" type="text" name="screenname" placeholder="Enter Display name"></input>
        <br>
        <br>
        <textarea rows="4" cols="50" name="skill_learned" placeholder="What did you Learn today?" type="text" id="learned" name="learned" required></textarea>
        <br>
        <br>
        <div class="text-center">
            <br>
            <button> <a href="../index.php">Home</a> </button>
            <button type="submit"name="submit_skill" id="save-skill">Save</button>
        </div>
    </form>
';

?>