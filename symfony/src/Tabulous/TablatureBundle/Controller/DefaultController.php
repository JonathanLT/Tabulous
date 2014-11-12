<?php

namespace Tabulous\TablatureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TablatureBundle:Default:index.html.twig', array('name' => $name));
    }
}
