<?php
	if(!isset($_SESSION)) { 
		session_start(); 
	}
?>
<h2><?php echo $user['name'] ?> (BOSS)</h2>
<h3>Session ID: <?php echo session_id() ?></h3>
<h3>ID: <?php echo $user['id'] ?></h3>