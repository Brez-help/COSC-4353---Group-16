<?php

use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase {
    public function test1() {
        $result = false;
        $name = '';
        
        $Adda = '';
     
        $City = '';

        $Zip = '';

        $State = '';
        if (empty($name) || empty($Adda) || empty($City) || empty($Zip) || empty($State)) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test2() {
        $result = false;
        $name = 'bobob';
        
        $Adda = '3456 cougrar libe dr';
     
        $City = 'Houston';

        $Zip = '77002';

        $State = 'TX';
        if (empty($name) || empty($Adda) || empty($City) || empty($Zip) || empty($State)) {
            $result = true;
        }

        $this->assertEquals(false, $result);
    }
}