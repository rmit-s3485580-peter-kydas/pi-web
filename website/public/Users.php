<?php
	$userList = array();
	exec("arp -an 2>&1", $userList);
	//exec("ls 2>&1", $userList);

?>

<p>
	Connected Users:
	<br>
	<?php 
		foreach($userList as $user){
			if (strpos($user, "ether") !== FALSE ){
				$pos = strpos($user, "192.168.4.");
				if ($pos !== FALSE){
					// $end = strpos($user, ")", $pos);
					echo substr($user, $pos, 13);
				}
				echo "<br>";	
			}
		}
	 ?>	
</p>