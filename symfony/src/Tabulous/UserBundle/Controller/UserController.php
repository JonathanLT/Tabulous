<?php

namespace Tabulous\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function loginAction()
    {
        return $this->render('UserBundle:Default:index.html.twig', array('name' => $name));
    }

    public function registerAction()
    {
        return $this->render('UserBundle::register.html.twig');
    }
}
