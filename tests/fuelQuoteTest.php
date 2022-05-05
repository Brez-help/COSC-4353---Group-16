<?php

use PHPUnit\Framework\TestCase;

class fuelQuoteTest extends TestCase {
    
    public function testEmpty1() {
        $result = false;
        $gallonsrequested = '';
        $deliverlyDate = "";
        $deliverFrom = "";
        if(empty($gallonsrequested) || empty($deliverlyDate) || empty($deliverFrom)) {
            $result = true;
        }



        $this->assertEquals(true, $result);
    }

    public function testEmpty2() {
        $result = false;
        $gallonsrequested = '';
        $deliverlyDate = "12-12-2024";
        $deliverFrom = "TX";
        if(empty($gallonsrequested) || empty($deliverlyDate) || empty($deliverFrom)) {
            $result = true;
        }


        $this->assertEquals(true, $result);
    }

    public function testEmpty3() {
        $result = false;
        $gallonsrequested = 1000;
        $deliverlyDate = "";
        if(empty($gallonsrequested) || empty($deliverlyDate) || empty($deliverFrom)) {
            $result = true;
        }


        $this->assertEquals(true, $result);
    }

    public function testEmpty4() {
        $result = false;
        $gallonsrequested = 1000;
        $deliverlyDate = "12-12-2024";
        $deliverFrom = "";
        if(empty($gallonsrequested) || empty($deliverlyDate) || empty($deliverFrom)) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function testGallons() {
        $result = false;
        $gallonsrequested = -1000;
        
        if($gallonsrequested <= 0) {
            $result = true;
        }


        $this->assertEquals(true, $result);


    }
    public function testDate() {
        $result = false;
        $deliverlyDate = "12-12-2021";
        $today = date("Y-m-d");

        if($today > $deliverlyDate) {
            $result = true;
        }


        $this->assertEquals(true, $result);
    }
    public function testCorrect() {
        $result = false;
        $gallonsrequested = 1000;
        $deliverlyDate = "12-12-2024";
        $deliverFrom = "TX";
        $today = date("Y-m-d");
        if(empty($gallonsrequested) || empty($deliverlyDate) || empty($deliverFrom)) {
            $result = true;
        }
        if($gallonsrequested <= 0) {
            $result = true;
        }
        if($today < $deliverlyDate) {
            $result = true;
        }



        $this->assertEquals(false, $result);
    }
}
