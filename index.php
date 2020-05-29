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
    <?php include('db.php');
    $limit = 4;
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };
    $start_from = ($pn-1) * $limit;
    $query = "select * from phonedetails order by Name limit $start_from, $limit";
    $result=mysqli_query($cn,$query);
    ?>

    <div class="container">
    <div class="row"></div>
        <div class="col-sm-12 div-one">
            <div class="div-one-inside">
                <h4>RM-PHONEBOOK</h4>
            </div>
        </div>
        <div class="col-sm-12 div-two">
            <div class="div-two-inside">
                <div class="col-sm-12" style="margin-bottom: 30px;">
                    <div class="search-bar">
                        <form action="index.php" method="post">
                            <input class="col-sm-10" type="text" placeholder="Search..." name="valuetosearch" title="Type in a name" id="valuetosearch">
                            <button class="col-sm-1" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <!-- <input type="submit" name="search" value="Filter"> -->
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <?php 
                        if(isset($_POST['search'])){
                            $valuetosearch = $_POST['valuetosearch'];
                            $query1 = "SELECT * FROM `phonedetails` WHERE CONCAT(`Name`, `Date-Of-Birth`, `Phone Number`, `Email`) LIKE '%".$valuetosearch."%' ORDER BY Name";
                            $result1 = mysqli_query($cn,$query1);

                            while($row = mysqli_fetch_array($result1)){?>
                                <div id="accordion">
                                  <div class="card" id="card">
                                    <div class="card-header" id="heading">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="true" aria-controls="collapse">
                                          <span style="float: left;"><?php echo $row['Name']; ?></span> <span style="float: right;"><i class="fa fa-caret-down" style="margin-left: 40em;"></i></span>
                                        </button>
                                      </h5>
                                    </div>
                                
                                    <div id="collapse<?php echo $row['id'] ?>" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                                      <div class="card-body">
                                        <h6 style="display: inline-block">Date-of-Birth: <span style="font-weight: bold;"><?php echo $row['Date-Of-Birth'] ?></span></h6>
                                        <span style="float: right;">
                                            <button class="btn btn-primary btn-sm" type="button">Edit</button>
                                            <button class="btn btn-danger btn-sm" type="button" onclick="delete.php">Remove</button>
                                        </span>
                                        <div class="row details-container">
                                            <div class="col-sm-4">
                                                <span style="background: black; color: white; padding: 2px 5px; border-radius: 5px;"><i class="fa fa-phone"></i></span> +91 <?php echo $row['Phone Number'] ?> 
                                            </div>
                                            <div class="col-sm-4">
                                                <span style="background: black; color: white; padding: 2px 5px; border-radius: 5px;"><i class="fa fa-envelope"></i></span> <?php echo $row['Email'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            
                            <?php }
                        }
                        else{
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <div id="accordion">
                          <div class="card" id="card">
                            <div class="card-header" id="heading">
                              <h5 class="mb-0">
                                <button class="btn btn-link btn-block" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="true" aria-controls="collapse">
                                  <span style="float: left;"><?php echo $row['Name']; ?></span> <span style="float: right;"><i class="fa fa-caret-down" style="margin-left: 40em;"></i></span>
                                </button>
                              </h5>
                            </div>

                            <div id="collapse<?php echo $row['id'] ?>" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                              <div class="card-body">
                                <h6 style="display: inline-block">Date-of-Birth: <span style="font-weight: bold;"><?php echo $row['Date-Of-Birth'] ?></span></h6>
                                <span style="float: right;">
                                    <!-- <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>" onclick="index.php?editid=<?php echo $row['id'] ?>">Edit</button> -->
                                    <a href="edit.php?editid=<?php echo $row["id"] ?>" id="edit" class="btn btn-primary btn-sm">Edit</a>

                                    
                                    <!-- <button class="btn btn-danger btn-sm" type="button">Remove</button> -->
                                    <a href="delete.php?deleteid=<?php echo $row["id"]; ?> "id="del" Onclick="return ConfirmDelete()" class="btn btn-danger btn-sm">Remove</a>
                                    <script>
                                        function ConfirmDelete() {
                                            return confirm("Do you want to delete?");
                                        }
                                    </script>
                                </span>
                                <div class="row details-container">
                                    <div class="col-sm-4">
                                        <span style="background: black; color: white; padding: 2px 5px; border-radius: 5px;"><i class="fa fa-phone"></i></span> +91 <?php echo $row['Phone Number'] ?> 
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="background: black; color: white; padding: 2px 5px; border-radius: 5px;"><i class="fa fa-envelope"></i></span> <?php echo $row['Email'] ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <?php } } ?>
                </div>

                

            </div>
        </div>
        <div class="col-sm-12 div-three">
            <div class="row div-three-inside">
                <div class="col-sm-6 pagination-div">
                    
                        <ul class="pagination">
                    <?php 
                    $sql = "SELECT COUNT(*) FROM phonedetails";   
                    $rs_result = mysqli_query($cn,$sql);   
                    $row = mysqli_fetch_row($rs_result);   
                    $total_records = $row[0];

                    // Number of pages required. 
                    $total_pages = ceil($total_records / $limit);   
                    $pagLink = "";                         
                    for ($i=1; $i<=$total_pages; $i++) { 
                      if ($i==$pn) { 
                          $pagLink .= "<li class='page-item active'><a class='page-link' href='index.php?page="
                                                            .$i."'>".$i."</a></li>"; 
                      }             
                      else  { 
                          $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'> 
                                                            ".$i."</a></li>";   
                      } 
                    };
                    echo $pagLink;
                    ?>
                    </ul>
                </div>
                <div class="col-sm-2 add-button">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                                        
                          <!-- Modal Header -->
                          <div class="modal-header" style="background-color: #359DF7; color: white;">
                            <h4 class="modal-title">Add Contact</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                                        
                          <!-- Modal body -->
                          <div class="modal-body">
                              <form action="index.php" method="POST" id="add-contact">
                                  <div class="form-group">
                                      <label for="uname">Name:</label>
                                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group">
                                      <label for="uname">Date-of-Birth:</label>
                                      <input type="date" class="form-control" id="dob" placeholder="Enter Date-of-Birth" name="dob" required>
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group">
                                      <label for="uname">Phone Number:</label>
                                      <div class="col-sm-10" style="display: inline-block; padding: 0px;">
                                      <input type="text" class="form-control" id="phn" placeholder="Enter Phone Number" name="phn" required>
                                      </div>
                                      <div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;">
                                        <span class="add-phn"><i class="fa fa-plus-circle"></i></span>
                                      </div>
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group">
                                      <label for="uname"> Email:</label><br>
                                      <div class="col-sm-10" style="display: inline-block; padding: 0px;">
                                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required> 
                                      </div>
                                      <div class="col-sm-1" style="display: inline-block; padding: 0px 1rem;">
                                        <span class="add-email"><i class="fa fa-plus-circle"></i></span>
                                      </div>
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div></br>
                                  <div class="form-group">
                                      <!-- <button type="button" class="btn btn-success btn-block" onclick="index.php" name="button">Submit</button> -->
                                      <input onclick="index.php" class="btn btn-success btn-block" id="btn" type="submit" name="submit" value="SAVE" style="font-size: 1.2rem; letter-spacing: 1px; font-weight: bold;"/>
                                    </div>
                              </form>
                          </div>
                                        
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>

<!-- Form Connection Starts -->
<?php
if(isset($_POST['submit'])){
$name = $_POST['name'];
$dob = $_POST['dob'];
$phn = $_POST['phn'];
$email = $_POST['email'];

$query = "INSERT INTO `phonedetails`(`Name`, `Date-Of-Birth`, `Phone Number`, `Email`) VALUES ('$name', '$dob', '$phn', '$email')";

$run = mysqli_query($cn, $query);
// header("location: index.php");
alert("Contact added successfully!");

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
echo "<meta http-equiv='refresh' content='0'>";
}
?>
                          
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>