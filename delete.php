<?php
require('index.php');
include('db.php');
$id = $_GET['deleteid'];
$del = mysqli_query($cn,"delete from phonedetails where id='$id'");
$query_run = mysqli_query($cn,$del);
if($query_run){
	header('Location:index.php');
}else{
    echo 'Error while deleting contact';
    // header('Location:index.php');
}
?>