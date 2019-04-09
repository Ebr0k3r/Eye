<?php
include "../config.php";
$id=$_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from usuarios where id='$id'");
	if($query){
	    echo "<script>alert('Elimidado exitosamente'); location.href='panel.php';</script>";
	} else{
	  header('location: panel.php');
	}
}
?>