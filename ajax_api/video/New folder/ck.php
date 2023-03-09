<?php
include_once("dbdb.php");
$method=$_REQUEST['method'];
$name=$_REQUEST['name'];
$link1=$_REQUEST['link1'];
$sql24323="INSERT INTO video SET name='$name',link='$link1'";
$query_insert111 = $dbConnection->prepare( $sql24323 );
$query_insert111->execute();
header('Location: ../ck.html');
?>

