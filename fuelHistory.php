<?php
    session_start();
    include_once 'fuelQuote.inc.php';
    $username = $_SESSION['username'];

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


    <nav id="navbar">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <a href="AccountInfo.php">Account Info</a>
            <a href="logout.php">Logout</a>
            <a href="fuelQuote.php">Fuel Quote Form</a>
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
        <br>
        <br>

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
