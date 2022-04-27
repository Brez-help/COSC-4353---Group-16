
<?php
    session_start();
    include_once 'fuelQuote.inc.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Fuel Quote Form</title>
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .right {
            text-align: right;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

                .sidenav a:hover {
                    color: #f1f1f1;
                }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

                .sidenav a {
                    font-size: 18px;
                }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Fuel Quote Form</h1>
        </div>
    </header>

    <nav id="navbar">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <a href="AccountInfo.php">Account Info</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="right">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">

                <img class="manImg" src="images/profile.jpg" style="width:50px;height:50px;"></img>

            </span>
        </div>
        <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
        </script>
    </nav>

    <div class="container">

    <?php
        $username = $_SESSION['username'];
        $sql = "select AddressA from clientinfo where loginafule_Username = '$username';";
        $result = mysqli_query($conn, $sql);
        $data= mysqli_fetch_assoc($result);
        $address = $data['AddressA'];
        $found = false;
                    
        if(isset($_POST['gallonsRequested']) || isset($_POST['deliverlyDate']) || isset($_POST['deliverFrom']) /*|| isset($_POST['suggestedPrice'])*/) {
            $gallonsRequested = $_POST['gallonsRequested'];
            $deliverlyDate = $_POST['deliverlyDate'];
            $deliverFrom = $_POST['deliverFrom'];
            $user = $username;
            $today = date("Y-m-d");
            $empty;
            $small;
            $yesterday;
            $found = false;

            if (empty($gallonsRequested) || empty($deliverlyDate) || empty($deliverFrom)) {
                $found = true;
                $empty = "Please enter all fields<br>";
                
            }
            
            else if($gallonsRequested <= 0) {
                $small = "Please select an amount greater than 0<br>";
                $found = true;
            }
            
            else if ($today > $deliverlyDate){
                $found = true;
                $yesterday = "Please select a day after tomorrow for deliverly<br>";
            }

            if (!$found) {
                $cost = new pricingModule($gallonsRequested,  $deliverFrom, $conn, $user);
                $suggestedPrice = $cost->getsuggestedPrice();
                $totalCost = $cost->gettotalCost();
                
                $query = "INSERT INTO `fuelform`(SugPrice, DelDate, DelAddress, DelForm, GalReq, TotalCost, loginafule_User)
                VALUES ('$suggestedPrice', '$deliverlyDate', '$address', '$deliverFrom', '$gallonsRequested', '$totalCost', '$user');";
                
                $result   = mysqli_query($conn, $query);
            }
                
                
        }
        
    ?>

        <form class="myform" id="myform" action="fuelQuote.php" method="POST">
            <h2>New Purchase</h2>
            <div id="error"> <?php if (!empty($empty)) {
                    echo $empty;
                }; ?></div>
            <div class="form-group">
                <lable for="gallonsRequested">Gallons Requested:</lable>
                <div id="error"> <?php if (!empty($small)) {
                    echo $small;
                }; ?></div>
                <input type="number" step = "0.01" id="gallonsRequested" name="gallonsRequested"/>
            </div>
            <div class="form-group">
                <label for ="deliverlyDate">Deliverly Date:</label>
                <div id="error"> <?php if (!empty($yesterday)) {
                    echo $yesterday;
                }; ?></div>
                <input type="date" placeholder="mm-dd-yyyy" id="deliverlyDate" name="deliverlyDate" />
            </div>
            <div class="form-group">
                <label for="deliverFrom">Deliver From:</label>
                <select id = "deliverFrom" name="deliverFrom">
                    <option value=""></option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
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
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
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
            <!--div class="form-group">
                <label for="suggestedPrice">Suggested Price:</label>
                <input type="number" step = "0.01" id="suggestedPrice" name="suggestedPrice"/>
            </div-->
            <div class="form-group">
                <button class="btn" type="submit" name="button" value="Submit">Submit</button>
            </div>

        </form>
       

        <table class="mytable" id="mytable">
            <thead>
                <tr class="tophead">
                    <th colspan="16">Fuel Quote History</th>
                </tr>
                <tr>
                    <th>Gallons Requested</th>
                    <th>Delivery Address</th>
                    <th>Date Delivered</th>
                    <th>Delivered From</th>
                    <th>Suggested Price</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "Select GalReq, DelAddress, DelDate, DelForm, SugPrice, TotalCost from fuelform where loginafule_User = '$username';";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if($resultCheck > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['GalReq']; ?></td>
                    <td><?php echo $row['DelAddress']; ?></td>
                    <td><?php echo $row['DelDate']; ?></td>
                    <td><?php echo $row['DelForm']; ?></td>
                    <td><?php echo $row['SugPrice']; ?></td>
                    <td><?php echo $row['TotalCost']; ?></td>
                </tr>
<?php }} ?>
            </tbody>
        </table>


    </div>
    <!--script src="fq.js"></script-->
</body>
</html>
