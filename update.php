<?php
require('index.php');
if(isset($_POST['update'])){
    $getid = $_POST['id'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$phn = $_POST['phn'];
$email = $_POST['email'];

$upd = "UPDATE `phonedetails` SET `Name`='$name', `Date-Of-Birth`='$dob', `Phone Number`='$phn', `Email`='$email' WHERE `id`='$getid'";
$query_run = @mysqli_query($upd);
if($query_run){
	header('Location: index.php');
}else{
    echo 'Error while updating contact';
    // header('Location:index.php');
}
}
?>