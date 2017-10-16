<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MySecurityBundle\Infrastructure\Repository;;
use MySecurityBundle\Domain\Repository\IPersonRepository;
use MySecurityBundle\Domain\Model\Person;

class InMemoryPersonRepository implements IPersonRepository{
    private $people;
    
    function __construct() {
        $this->people[] = new Person("peperez", "Pepe", "Perez", "1234");
        $this->people[] = new Person("malopez", "Maria", "Lopez", "5678");
    }

    
    public function findPerson($username) {
        
        foreach ($this->people as $person){
            if($person->getUsername() === $username){
                return $person;
            }
        }
        
        
    }

}
