<?php

$dbservername = "localhost";
$dbUsername = "dietrich";
$dbPassword = "12345";
$dbName = "loginadfule";

$conn = mysqli_connect($dbservername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed");
}

/*if(isset($_POST['gallonsRequested']) || isset($_POST['deliverlyDate']) || isset($_POST['deliverFrom']) || isset($_POST['suggestedPrice'])) {
    $gallonsRequested = $_POST['gallonsRequested'];
    $deliverAddress = '4361 Cougar Village Dr';
    $deliverlyDate = $_POST['deliverlyDate'];
    $deliverFrom = $_POST['deliverFrom'];
    $suggestedPrice = $_POST['suggestedPrice'];
    $totalCost = '230.34';
    $user = 'dwolf22';

    $query = "INSERT INTO `fuelform`(SugPrice, DelDate, DelAddress, DelForm, GalReq, TotalCost, loginafule_User)
    VALUES ('$suggestedPrice', '$deliverlyDate', '$deliverAddress', '$deliverFrom', '$gallonsRequested', '$totalCost', '$user');";

    $result   = mysqli_query($conn, $query);

}*/


?>