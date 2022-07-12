<?php
require "conn.php";

$manufacturer=$_POST["first"];
$model= $_POST["second"];

$mysql_qry="SELECT * FROM underwater_rov WHERE Manufactuer = 'BlueRobotics' AND Model = 'BlueRov2';";
$result = mysqli_query($conn , $mysql_qry);

if(mysqli_num_rows($result) > 0 )
{
	$details=array();
	while($row = mysqli_fetch_assoc($result) )
	{
		array_push($details,$row);
	}
	$response['details']= $details;
}
else
{
	$response['message']='No data';
}

echo json_encode($response);
mysqli_close($conn);	

?>