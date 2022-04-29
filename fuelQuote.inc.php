<?php

$dbservername = "localhost";
$dbUsername = "dietrich";
$dbPassword = "12345";
$dbName = "loginadfule";

$conn = mysqli_connect($dbservername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed");
}

/*Suggested Price = Current Price + Margin

Where,

Current price per gallon = $1.50 (this is the price what distributor gets from refinery and it varies based upon crude price. But we are keeping it constant for simplicity)
Margin =  Current Price * (Location Factor - Rate History Factor + Gallons Requested Factor + Company Profit Factor)

*/


class pricingModule{
    private $suggestedPrice;
    private $margin;
    private $locationFactor;
    private $rateHistory;
    private $grf;
    private $totalCost;

    public function __construct($gallonsRequested, $deliverFrom, $conn, $user)
    {
        $this->deliverFrom = $deliverFrom;
        $sql = "Select count(DelForm) as total from fuelform where DelForm = '$deliverFrom';";
        $result = mysqli_query($conn, $sql);
        $data= mysqli_fetch_assoc($result);

        if ($data['total'] > 0) {
            $this->rateHistory = .01;
        }
        else {
            $this->rateHistory = 0;
        }

        $sql = "Select State from clientinfo where loginafule_Username = '$user';";
        $result = mysqli_query($conn, $sql);
        $data= mysqli_fetch_assoc($result);
        $home = $data['State'];

        if($home !== $deliverFrom) {//instate
            $this->locationFactor = .04;
        }
        else {
            $this->locationFactor = .02;//outofstate
        }

        if($gallonsRequested > 1000) {
            $this->grf = .02;
        }
        else{
            $this->grf = .03;
        }

        $this->margin = $this->locationFactor - $this->rateHistory + $this->grf + .1;
        $this->margin = $this->margin * 1.50;

        $this->suggestedPrice = 1.50 + $this->margin;
        $this->suggestedPrice = round($this->suggestedPrice, 2);
        $this->totalCost = $gallonsRequested * $this->suggestedPrice;
        $this->totalCost = round($this->totalCost, 2);

    }
    public function gettotalCost() {
        return $this->totalCost;
    }
    public function getsuggestedPrice() {
        return $this->suggestedPrice;
    }

}





?>