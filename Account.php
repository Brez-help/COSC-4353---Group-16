<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include_once 'fuelQuote.inc.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Account</title>
        <link rel="stylesheet" href="src/style.css"/>
    </head>
    <body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        $Fq = $_SESSION["username"];
        
        $name = $_REQUEST['name'];
        
        $Adda = $_REQUEST['Adda'];
     

        $Addb = $_REQUEST['Addb'];

        $City = $_REQUEST['City'];

        $Zip = $_REQUEST['Zip'];

        $State = $_REQUEST['State'];

        
        $query    = "REPLACE into `clientinfo` (Name, AddressA,AddressB,City,Zipcode,State,loginafule_Username)
                     VALUES ('$name', '$Adda','$Addb','$City','$Zip','$State','$Fq')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <div class='myform'>
                  <h3>You Have successfully updated your info.</h3><br/>
                  <p class='link'>Click here to <a href='AccountInfo.php'>View Account</a></p>
                  <p class='link'>Or click here to <a href='fuelQuote.php'>View FuelQuote</a></p>

                  </div>";
        } else {
            echo "
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <div class='myform'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
        $Fq = $_SESSION["username"];
        $name = "";
        $AddressA = "";
        $AddressB = "";
        $City = "";
        $Zipcode = "";
        $State = "Please Select State";
        $query = "Select Name, AddressA, AddressB, City, Zipcode, State from clientinfo where loginafule_Username='$Fq';";
        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            while($row = mysqli_fetch_array($result)) {
                $name = $row['Name'];
                $AddressA = $row['AddressA'];
                $AddressB = $row['AddressB'];
                $City = $row['City'];
                $Zipcode = $row['Zipcode'];
                $State = $row['State'];
            }
        }

?>

<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
    <hr>
    <div class="row">
        
        
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
       
             
                <i class="fa fa-coffee"></i>

            <form class="myform" method = "post">
                <div class = "form-group">
                    <h3>Personal info</h3>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Full name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" type="text" value="<?php echo $name;?>" maxlength="50" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="Adda" type="text" value="<?php echo $AddressA;?>" maxlength="100" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address 2:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="Addb" type="text" value="<?php echo $AddressB;?>" maxlength="100">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="City" type="text" value="<?php echo $City;?>" maxlength="100" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Zip code:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="Zip" type="text" value="<?php echo $Zipcode;?>" maxlength="9" minlength="5" onkeypress="return event.charCode != 32" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">State:</label>
                    <div class="form-group">
                        <div class="ui-select">
                            <select id="user_time_zone" name="State" class="form-control" required>
                                <option value="<?php echo $State;?>"><?php echo $State;?></option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire	</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico	</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>


                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save" class="btn"/>


            </form>
        </div>
    </div>
</div>
<hr>
<?php
    }
?>
    </body>
</html>