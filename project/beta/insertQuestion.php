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

// ------------------- 490_testbank insert function start ------------

$question   = $_POST ['question'] ; 
$topic 		= $_POST ['topic'] ; 
$difficulty = $_POST ['difficulty'] ; 

function insertTestBank ($qid, $question, $topic, $difficulty, $sql_cnct) 
{
	$inQ   = "INSERT INTO 490_testbank VALUES ('$qid', '$question', '$topic', '$difficulty') ";
	($t = mysqli_query ($sql_cnct , $inQ ) ) or die ( mysqli_error( $sql_cnct) );
}

if ( $question=="" || $question==":" || trim($question)=="" )
{
	exit();
}
else
{
insertTestBank ($qid, $question, $topic, $difficulty, $sql_cnct);
}

// ------------------- 490_testbank insert function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>