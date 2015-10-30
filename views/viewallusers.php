<?php
require_once('../database_class.php');

$getallusers ='SELLECT * FROM user';


$udb = Database::getInstance();
	$users = $udb->qry('SELECT * FROM "users"');
	echo '<h3> Below should show the users in the user table id AND their screen name</h3>';
	var_dump ($users);
	if ($users) {
			foreach($users as $user) {
					var_dump ($users);
					echo $user;
			    echo("<p value=\"{$user['users_id']}\">{$user['users_id']}</p>");
			    echo("<p value=\"{$user['users_id']}\">{$user['display_name']}</p>");
			}
	}else{
		echo '<br> You crazy person you did not have any users stored';
	}
/*
$replyforallusers = @mysql_query($dbConfig,$getallusers);
if($replyforallusers){
    echo'
    
    ';
    while($row = mysql_fetch_array($replyforallusers)){
        $row[displayname];
    }
}else{
    echo'Query Failed';
    echo mysql_error($dbConfig);
}*/
?>