<?php

namespace PizzaFormBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Pedido {
    
        /**
 	* @Assert\NotBlank()
 	*/
	private $custname;
    
	/**
 	* @Assert\NotBlank()
 	*/
	private $custtel;
    
	/**
 	* @Assert\NotBlank()
 	* @Assert\Email()
 	*/
    
	private $custemail;
    
	/**
 	* @Assert\NotBlank()
 	* @Assert\Choice(choices={"small","medium","large"})
 	*/
	private $size;
    
	/**
 	* @Assert\Choice(choices={"cheese","onion","bacon","mushroom"},multiple=true)
 	*/
	private $toppings;

	private $comments;

    
        function getCustname() {
            return $this->custname;
        }

        function getCusttel() {
            return $this->custtel;
        }

        function getCustemail() {
            return $this->custemail;
        }

        function getSize() {
            return $this->size;
        }

        function getToppings() {
            return $this->toppings;
        }

        function getComments() {
            return $this->comments;
        }

        function setCustname($custname) {
            $this->custname = $custname;
        }

        function setCusttel($custtel) {
            $this->custtel = $custtel;
        }

        function setCustemail($custemail) {
            $this->custemail = $custemail;
        }

        function setSize($size) {
            $this->size = $size;
        }

        function setToppings($toppings) {
            $this->toppings = $toppings;
        }

        function setComments($comments) {
            $this->comments = $comments;
        }


    
}
