<?php
ob_start();
require_once 'db.php';
$getid = '';
if( isset( $_GET['editid'])) {
    $getid = $_GET['editid']; 
}

 // update
 if(isset($_POST['update1'])){
      $getid = $_POST['id'];
      $name = $_POST['name'];
      $dob = $_POST['dob'];
      $phn = $_POST['phn'];
      $email = $_POST['email'];
    $qu = ("UPDATE `phonedetails` SET `Name`='$name', `Date-Of-Birth`= '$dob', `Phone Number`= '$phn', `Email`='$email' WHERE `id` ='$getid'");

  $run_query = mysqli_query($cn,$qu);
  if($run_query){
  header("Location:index.php");
  }
  else{
   echo '<p class="errorMsg">There was error while updating record</p>';  
  }
 }
 $query = "SELECT * FROM phonedetails WHERE id ='$getid' ";
  $result = mysqli_query($cn,$query);
   $row = @mysqli_fetch_assoc($result);
   // echo $row['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phonebook Web App</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    <div class="row"></div>
        <div class="col-sm-12 div-one">
            <div class="div-one-inside">
                <h4>RM-PHONEBOOK</h4>
            </div>
        </div>
        <div class="col-sm-12 div-two">
            <div class="div-two-inside">
                <div class="col-sm-12 edit-contact-one">
                    <h4 style="color: white;">Edit Contact</h4>
                </div>
                <div class="col-sm-12 edit-contact-two">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name ="id" value= "<?php echo $row['id'];?>"><br>

                <div class="form-group">
                    <label for="uname" style="color: white;">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row['Name'] ?>" name="name">
                </div>
                <div class="form-group">
                    <label for="uname" style="color: white;">Date-of-Birth:</label>
                    <input type="date" class="form-control" id="dob" value="<?php echo $row['Date-Of-Birth'] ?>" name="dob">
                </div>
                <div class="form-group" id="phn">
                    <label for="uname" style="color: white;">Phone Number:</label><br>
                    <div class="col-sm-10" style="display: inline-block; padding: 0px;">
                    <input type="text" class="form-control" id="phn" value="<?php echo $row['Phone Number'] ?>" name="phn">
                    </div>
                    <div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;">
                      <button id="addphn" type="button" class="btn add-more button-yellow uppercase"><span class="add-phn" id="addnewphn"><i class="fa fa-plus-circle"></i></span>  
                    </div>
                </div>

<!-- New Input Field Starts-->
    <script>
        $(document).ready(function() {
        $(".delete").hide();
        //when the Add Field button is clicked
        $("#addphn").click(function(e) {
          $(".delete").fadeIn("1500");
          //Append a new row of code to the "#items" div
          $("#phn").append(
            '<div class="form-group" id="newphn"><br><div class="next-phn col-sm-10"  style="display: inline-block; padding: 0px;"><input id="textinput" name="textinput" type="text" placeholder="Enter Phone Number" class="form-control"></div><div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;"><button class="delete btn button-white uppercase"><span class="add-phn"><i class="fa fa-times-circle"></i></span></button></div></div>'
          );
        });
        $("body").on("click", ".delete", function(e) {
          $(".next-phn").last().remove();
        });
      });

    </script>
<!-- New Input Field Ends-->

                <div class="form-group" id="email">
                    <label for="uname" style="color: white;"> Email:</label><br>
                    <div class="col-sm-10" style="display: inline-block; padding: 0px;">
                      <input type="text" class="form-control" id="email" value="<?php echo $row['Email'] ?>" name="email"> 
                    </div>
                    <div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;">
                    <button id="addemail" type="button" class="btn add-more button-yellow uppercase"><span class="add-email" id="addnewemail"><i class="fa fa-plus-circle"></i></span>
                    </div>
                </div></br>
                <a href="index.php" class="btn btn-danger btn-sm">Back</a>
                <input type="submit" value ="Update" name="update1" class="btn btn-success btn-sm" style="float: right;">

<!-- New Input Field Starts-->
<script>
        $(document).ready(function() {
        $(".delete").hide();
        //when the Add Field button is clicked
        $("#addemail").click(function(e) {
          $(".delete").fadeIn("1500");
          //Append a new row of code to the "#items" div
          $("#email").append(
            '<div class="form-group" id="newemail"><br><div class="next-phn col-sm-10"  style="display: inline-block; padding: 0px;"><input id="textinput" name="textinput" type="text" placeholder="Enter Email" class="form-control"></div><div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;"><button class="delete btn button-white uppercase" style="color: white;"><span class="add-email"><i class="fa fa-times-circle"></i></span></button></div></div>'
          );
        });
        $("body").on("click", ".delete", function(e) {
          $(".next-email").last().remove();
        });
      });

    </script>
<!-- New Input Field Ends-->

                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>