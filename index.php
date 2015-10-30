<?php
// A simple website in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

require_once('database_class.php');

echo'
	<div>
		<a href="views/addskillview.php">Add Learnt Skill</a>
	</div>
	<div>
		<a href="views/viewallusers.php">View users</a>
	</div>
';
	//$db = new Database(); //The singleton design pattern should prevent the creation of an object directly using new and force you to use getinstance
	
	
	
	$db = Database::getInstance();
	$skills = $db->qry('SELECT * FROM skills');
	echo '<h3> Below shows todays top learned skills added</h3>';
	if ($skills) {
		foreach($skills as $skill) {
			echo("<br>
					<label value=\"{$skill['skill_id']}\">{$skill['description']}
					</label>
				");
			
			echo("<br>
					<label>Did you learn this today also?</label>
				    <br>
				    <a href= 'index.php?thumb_up=true' > Tumbs Up </a>
			    		<label value=\"{$skill['skill_id']}\">{$skill['t_up']}</label>
			    	");
			    echo("
			    		<br>
					    <a href= 'index.php?thumb_down=true'> Thumbs Down </a>
					    <label value=\"{$skill['skill_id']}\">{$skill['t_down']}</label>
					    <br>
			    ");
		     if (isset($_POST['thumb_up'])) {
			    $i_learnt_that_too= $db->qry("UPDATE skills SET t_up++ WHERE $skill_id=4");
			  }
		}
	}
?>