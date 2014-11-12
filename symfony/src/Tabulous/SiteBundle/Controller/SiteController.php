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
      $listTablature = array(
      array(
        'title'   => 'Rammstein - Rosenrot',
        'id'      => 1,
        'author'  => 'Alexandre',
        'content' => 'Tablature basse',
        'date'    => new \Datetime()),
      array(
        'title'   => 'System of a Down - Pictures',
        'id'      => 2,
        'author'  => 'Hugo',
        'content' => 'Solo guitare',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Billy Talent - Fallen Leaves',
        'id'      => 3,
        'author'  => 'Mathieu',
        'content' => 'Rythmique + paroles',
        'date'    => new \Datetime())
    );

    return $this->render('SiteBundle:Site:index.html.twig', array(
      'listTablature' => $listTablature
    ));
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

  public function viewAction($id)
    {
      $tablature = array(
        'title'   => 'Rammstein - Rosenrot',
        'id'      => $id,
        'author'  => 'Alexandre',
        'content' => 'Tablature basse',
        'date'    => new \Datetime()
      );

      return $this->render('SiteBundle:Site:view.html.twig', array(
        'tablature' => $tablature
      ));
    }
}
