<?php
//Set the content-type header to xml
header("Content-type: text/xml");
//echo the XML declaration
echo chr(60).chr(63).'xml version="1.0" encoding="utf-8" '.chr(63).chr(62);

$mysqli = new mysqli("localhost", "root", "Hackr0p0le", "geomap");

/* V�rification de la connexion */
if ($mysqli->connect_errno) {
    printf("�chec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}
	
    //if(isset($_POST['user']))
    //{

    //$lat=addslashes($_POST['lat']);

    $sql = 'SELECT `user`,`latitude`,`longitude` from `Locations` where `id` in (select max(`id`) from `Locations` group by `user` )'; 
	$result = $mysqli->query( $sql );
	
	printf('<markers>');
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	printf('<marker lat="%s" lng="%s" user="%s"/>', $row["latitude"], $row["longitude"],$row["user"]);
	}
	printf('</markers>');

	//}

	
	/* free result set */
$result->free();

/* close connection */
$mysqli->close();


?>
