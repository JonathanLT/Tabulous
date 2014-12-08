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

public function last_addAction()
  {
    $em = $this->getDoctrine()->getManager();          
          $query1 = $em->createQuery(
                  'SELECT t FROM TablatureBundle:Tablature t  ORDER BY t.id DESC'
          );
              $listTablature1 = $query1->setMaxResults(3)->getResult();
              return $this->render('SiteBundle:Site:last_add.html.twig', array(
                                      'listTablature1' => $listTablature1));
  }

public function last_checkAction()
  {
    $em = $this->getDoctrine()->getManager();          
          $query2 = $em->createQuery(
                  'SELECT t FROM TablatureBundle:Tablature t  ORDER BY t.derniereconsultation DESC'
          );
              $listTablature2 = $query2->setMaxResults(3)->getResult();
              return $this->render('SiteBundle:Site:last_check.html.twig', array(
                                      'listTablature2' => $listTablature2));
        }

public function best_rateAction()
  {
    $em = $this->getDoctrine()->getManager();          
$query3 = $em->createQuery(
                  'SELECT t FROM TablatureBundle:Tablature t  ORDER BY t.moyenne ASC'
          );
              $listTablature3 = $query3->setMaxResults(3)->getResult();
              return $this->render('SiteBundle:Site:best_rate.html.twig', array(
                                      'listTablature3' => $listTablature3));
        }

}
