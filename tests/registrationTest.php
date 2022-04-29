<?php

use PHPUnit\Framework\TestCase;

class registrationTest extends TestCase {

    public function test1() {//if both user and pass emtpy
        $result = false;
        $username = '';
        $password = '';
        $db = 'dtrick45';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test2() {//if user is emtpy
        $result = false;
        $username = '';
        $password = 'passowrd';
        $db = 'dtrick45';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test3() {//if password is emtpy
        $result = false;
        $username = 'dtrick45';
        $password = '';
        $db = 'dtrick45';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test4() {//if password length is less than 8
        $result = false;
        $username = 'dtrick45';
        $password = 'pass';
        $db = 'dtrick45';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test5() {//if password length is greater than 20
        $result = false;
        $username = 'dtrick45';
        $password = 'passkjfkdkfjdsfjdsjfdjfkadlkfjdsjafdsafl;maf;lj;ldja;fjdklsmadk';
        $db = 'dtrick45';
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test6() {//if username not already in db
        $result = false;
        $username = 'dtrick45';
        $db = 'dtrick45';
        $password = 'password';

        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(true, $result);
    }
    public function test7() {//if username not already in db
        $result = false;
        $username = 'dtrick455';
        $db = 'dtrick45';
        $password = 'password';

        if (empty($username) || empty($password)) {
            $result = true;
        }
        else if ($username == $db) {
            $result = true;
        }
        else if (strlen($password) > 20) {
            $result = true;
        }
        else if (strlen($password) < 8) {
            $result = true;
        }

        $this->assertEquals(false, $result);
    }


}