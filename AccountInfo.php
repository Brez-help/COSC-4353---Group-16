<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Account Info</title>
        <link rel="stylesheet" href="src/style.css"/>
    </head>
    <body>
        <?php
require('db.php');
// When form submitted, insert values into the database.
$Fq = $_SESSION["username"];
//$sql = "SELECT Name,AddressA,AddressB,City,Zipcode,State FROM clientinfo WHERE loginafule_Username=$Fq";
$Adda="Select AddressA FROM clientinfo WHERE loginafule_Username=$Fq;";
$sql = "Select Name, AddressA, AddressB, City, Zipcode, State from clientinfo where loginafule_Username='$Fq';";
                    $result = mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
               


<div class="container bootstrap snippets bootdey">

    <h1 class="text-primary">Account Information</h1>
    <hr>
    <div class="row">


        <!-- edit form column -->
        <div class="col-md-9 personal-info">


            <i class="fa fa-coffee"></i>

            <form class="myform" role="form">
                <div class="form-group">
                    <h3>Personal info</h3>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Full name:</label>
                    <div class="col-lg-8">
                    <?php echo $row['Name'];?>                  </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                    <?php echo $row['AddressA']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address 2:</label>
                    <div class="col-lg-8">
                    <?php echo $row['AddressB']; ?>                   </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City:</label>
                    <div class="col-lg-8">
                    <?php echo $row['City'];?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Zipcode:</label>
                    <div class="col-lg-8">
                    <?php echo $row['Zipcode']; ?>                   </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">State:</label>
                    <div class="col-lg-8">
                        <div class="ui-select">
                        <?php echo $row['State'];?>
                        </div>
                    </div>
                </div>
                <div class = "form-group">    
                    <input onclick="window.location.href='Account.php'" type="button" value="Edit" class = "btn">
                </div>
                <div class = "form-group">
                    <input onclick="window.location.href='fuelQuote.php'" type="button" value="Visit Fuel Quote page" class = "btn">
                </div>

            </form>
        </div>
    </div>
</div>
<hr>
<?php }} ?>
</body>

</html>