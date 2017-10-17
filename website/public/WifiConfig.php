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
	</div>
</form>

<?php 

	if (isset($_POST)){
		echo($_POST['ssid']);
		echo($_POST['wpa']);
		//run all the stuff
	}


?>