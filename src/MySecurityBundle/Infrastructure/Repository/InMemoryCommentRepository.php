<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MySecurityBundle\Infrastructure\Repository;
use MySecurityBundle\Domain\Repository\ICommentRepository;
use MySecurityBundle\Domain\Model\Comment;
/**
 * Description of InMemoryCommentRepository
 *
 * @author jonathan
 */
class InMemoryCommentRepository implements ICommentRepository{
    
    private $comments;
    
    
    function __construct() {
        $this->comments[] = new Comment(1,"peperez","Soy el primero");
        $this->comments[] = new Comment(2,"malopez","Soy la segunda");
    }

    
    
    public function findAll() {
        return $this->comments;
    }

    
    public function findComment($id){
        foreach($this->comments as $comment){
            if($comment->getId()==$id){
                return $comment;
            }
            
        }
        
        
    }
}
