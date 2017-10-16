<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MySecurityBundle\Domain\Model;

/**
 * Description of Comment
 *
 * @author jonathan
 */
class Comment {
    private $id;
    private $owner;
    private $content;
    
    function __construct($id,$owner, $content) {
        $this->id=$id;
        $this->owner = $owner;
        $this->content = $content;
    }
    
    function getId() {
        return $this->id;
    }

        
    function getOwner() {
        return $this->owner;
    }

    function getContent() {
        return $this->content;
    }



}
