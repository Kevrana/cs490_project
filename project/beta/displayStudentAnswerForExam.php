<?php
//KEVIN RANA 
//backend  BETA
// CS490 - Group 4: Kevin Rana and Karmesh Patel and Thomas Livshits
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "account.php"     ) ;
$sql_cnct = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
mysqli_select_db( $sql_cnct, $project );

// ------------------- 490_studentsub All students answer  for particular exam start ------------

$examid  = $_POST ['examid'] ;
$ucid   = $_POST ['ucid'] ;

$squery = "SELECT * FROM 490_studentsub WHERE ucid='$ucid' AND examid='$examid'";
$sresult = mysqli_query($sql_cnct,$squery) or die(mysqli_error($sql_cnct));

	
	while ( $r = mysqli_fetch_array ( $sresult, MYSQLI_ASSOC) ) 
	{ 
		$array[] = $r;
	}	

echo json_encode($array);

// ------------------- 490_studentsub for particular Student end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>