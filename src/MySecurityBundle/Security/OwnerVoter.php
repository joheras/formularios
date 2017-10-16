<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MySecurityBundle\Security;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use MySecurityBundle\Security\MyUser;
use MySecurityBundle\Domain\Model\Comment;
/**
 * Description of OwnerVoter
 *
 * @author jonathan
 */
class OwnerVoter extends Voter{
    
    protected function supports($attribute, $subject): bool {
        if ($attribute !== 'edit' && $attribute !== 'view') {
            return false;
        }
        if (!$subject instanceof Comment) {
            return false;
        }
        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool {
        $user = $token->getUser();
        
        if(!$user instanceof UserInterface){
            return false;
        }
        
        if(!$user instanceof MyUser){
            throw new \LogicException('The user is from a different class');
            
        }
        
        if($attribute==='edit'){
            
            if($user->getUsername()===$subject->getOwner()){
                return true;
            }
            
        }
        
         if($attribute==='view'){
            
            return true;
            
        }
        
        return false;
        
    }

    
}
