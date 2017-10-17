<style>

input[type=text]{
	width: 40%;
	padding: 6px 10px;
	border: 2px solid gray;
	/*border-bottom: 2px solid gray;
	align: center; */
}


</style>

<form action="WifiConfig.php" method="POST">

	<div align="center">
		<p><label>SSID<br><input type='text' name='ssid' minlength=5 required></label>
		<p><label>Password<br><input type='text' name='wpa' minlength=8 required></label>
		<p><br><input type="submit" value="Submit">
		<p><br><?php getCurrentCreds(); ?>
	</div>
</form>

<?php 

	function getCurrentCreds(){
		$myfile = fopen('hostapd.conf', 'r');
		$lines = array();

		while (!feof($myfile)){
			//$lines.append(fgets($myfile));
			// $lines[] = fgets($myfile);
			$lines[] = fgets($myfile);
			//array_push($lines, fgets($myfile));
			// echo "<br>";
		}

		foreach ($lines as $l){
			if (strpos($l, "ssid=") !== FALSE){
				if (strpos($l, "ssid=") !== strpos($l, "ssid=0")){
					echo "Current " . $l . "<br>";
				}
			}
			
			if (strpos($l, "wpa_passphrase=") !== FALSE){
				echo "Current " . $l . "<br>";
			}
		}
	}

	if (isset($_POST)){
		$ssid = trim($_POST['ssid']);
		$wpa =trim($_POST['wpa']);

		// echo $ssid;
		// echo "<br>";
		// echo $wpa;

		if ($ssid == null || $wpa == null){
			return;
		}

		//echo "<br>passed the shit";
		// unset($_POST);
		//run all the stuff

		$myfile = fopen('hostapd.conf', 'r+');
		$lines = array();

		while (!feof($myfile)){
			//$lines.append(fgets($myfile));
			// $lines[] = fgets($myfile);
			$lines[] = fgets($myfile);
			//array_push($lines, fgets($myfile));
			// echo "<br>";
		}
		fclose($myfile);

		$newFile = fopen('hostapd.conf', 'w');
		//Edit the ssid and stuff
		foreach ($lines as &$l){
			if (strpos($l, "ssid=") !== FALSE){
				if (strpos($l, "ssid=") !== strpos($l, "ssid=0")){
					$l = "ssid=" . $ssid . "\n";
				}
			}
			if (strpos($l, "wpa_passphrase=") !== FALSE){
				$l = "wpa_passphrase=" . $wpa . "\n";
			}
			// $l .= '\n';

			fwrite($newFile, $l);
		}

		//break reference
		unset($l);
		fclose($newFile);

		$result = array();
		exec("sudo systemctl restart hostapd 2>&1", $result);
		print_r($result);

		// print_r($lines);

	}


?>
