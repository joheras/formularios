<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MySecurityBundle\Domain\Model;

class Person {
    private $username;
    private $name;
    private $lastname;
    private $password;
    private $salt;
    
    function __construct($username, $name, $lastname, $password) {
        $this->username = $username;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->salt = "";
    }

    function getUsername() {
        return $this->username;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }


    
    
    
}
