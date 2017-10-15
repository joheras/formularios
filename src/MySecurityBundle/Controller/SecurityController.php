<?php

namespace MySecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function adminAction()
    {
        return new Response('Welcome to the admin section');
    }
    
    public function  loginAction(Request $request){
        $authenticationUtils = $this->get('security.authentication_utils');
        
        $error = $authenticationUtils -> getLastAuthenticationError();
        
        $lastUserName = $authenticationUtils->getLastUsername();
        
        return $this->render("MySecurityBundle:MySecurity:login.html.twig",
                array('last_username' => $lastUserName,'error'=>$error));
        
        
    }
    
     public function zonaLoginAction()
    {
        return new Response('Welcome to the login section');
    }
}
