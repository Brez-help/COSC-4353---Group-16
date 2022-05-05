<?php

use PHPUnit\Framework\TestCase;

class loginTest extends TestCase {

    public function test1() {
        $result = false;
        $username = '';
        $password = '';
        if (empty($username) || empty($password)) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test2() {
        $result = false;
        $username = 'dtrick45';
        $password = '';
        if (empty($username) || empty($password)) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test3() {
        $result = false;
        $username = '';
        $password = 'password';
        if (empty($username) || empty($password)) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test4() {
        $result = false;
        $username = 'dtrick45';
        $password = 'pass';
        $dbu = 'dtrick45';
        $dbp = 'password';
        if ($username != $dbu || $password != $dbp) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test5() {
        $result = false;
        $username = 'dtrick';
        $password = 'password';
        $dbu = 'dtrick45';
        $dbp = 'password';
        if ($username != $dbu || $password != $dbp) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test6() {
        $result = false;
        $username = 'dtrick45';
        $password = 'password';
        $dbu = 'dtrick45';
        $dbp = 'password';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $dbu && $password != $dbp) {
            $result = true;
        }
        else if($username != $dbu && $password == $dbp) {
            $result = true;
        }
        else if($username != $dbu && $password != $dbp) {
            $result = true;
        }

        $this->assertEquals(false, $result);
    }

}