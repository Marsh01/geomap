<?php

$mysqli = new mysqli("localhost", "root", "Hackr0p0le", "geomap");

/* V�rification de la connexion */
if ($mysqli->connect_errno) {
    printf("�chec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}
	
    if(isset($_POST['user']))
    {

    $lat=addslashes($_POST['lat']);
    $long=addslashes(($_POST['long']));
    $user=addslashes($_POST['user']);
    $sql = 'INSERT INTO `Locations` (`user`,`latitude`,`longitude`)  VALUES ("'.$user.'", "'.$lat.'", "'.$long.'")'; 
	
	if ($mysqli->query( $sql ) === TRUE) {
		printf("OK");
	}
	else {
		printf("OK");
	}
	}
	

?>