<?php

namespace Tabulous\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
public function indexAction($page)
  {
    if ($page < 1) {
	throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
  return $this->render('SiteBundle:Site:index.html.twig');
  }

public function menuAction($limit)
  {
    // On fixe en dur une liste ici, bien entendu par la suite
    // on la récupérera depuis la BDD !
    $listTablature = array(
      array('id' => 2, 'title' => 'Metallica - One'),
      array('id' => 5, 'title' => 'AC/DC - Highway to hell'),
      array('id' => 9, 'title' => 'Rammstein - Sonne')
    );

    return $this->render('SiteBundle:Site:menu.html.twig', array(
      // Tout l'intérêt est ici : le contrôleur passe
      // les variables nécessaires au template !
      'listTablature' => $listTablature
    ));
  }

}
