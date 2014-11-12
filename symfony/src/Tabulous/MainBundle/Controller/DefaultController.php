<?php

namespace Tabulous\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TabulousMainBundle:Default:index.html.twig', array('name' => "TODO"));
    }
}
