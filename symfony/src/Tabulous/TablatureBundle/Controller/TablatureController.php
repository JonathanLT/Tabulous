<?php

namespace Tabulous\TablatureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
// N'oubliez pas ce use
use Doctrine\ORM\QueryBuilder;

class TablatureController extends Controller
{
    public function listeAction()
  {
    /* $listTablature = array(
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

    return $this->render('TablatureBundle::tablatures.html.twig', array(
      'listTablature' => $listTablature
    ));
    */


	$listTablature = $this->getDoctrine()->getRepository('TablatureBundle:Tablature')->FindAll();

	

	return $this->render('TablatureBundle::tablatures.html.twig', array(
      'listTablature' => $listTablature
    ));

  } 

  public function tablatureViewAction($id)
    {
      /* $tablature = array(
        'title'   => 'Rammstein - Rosenrot',
        'id'      => $id,
        'author'  => 'Alexandre',
        'content' => 'Tablature basse',
        'date'    => new \Datetime()
      );

      return $this->render('SiteBundle:Site:view.html.twig', array(
        'tablature' => $tablature
      )); */


        $tab = $this->getDoctrine()->getManager()->getRepository('TablatureBundle:Tablature')->find($id);

        if (!$tab) {
            throw $this->createNotFoundException('Unable to find tablature.');
        }

        return $this->render('SiteBundle:Site:view.html.twig', array(
            'tab' => $tab
        ));
    }

   public function artisteViewAction($id)
   {

   $tablatures = $this->getDoctrine()->getManager()->getRepository('TablatureBundle:Tablature')->findByidartiste($id);

        if (!$tablatures) {
            throw $this->createNotFoundException('Unable to find artiste.');
        }

        $artiste = $this->getDoctrine()->getManager()->getRepository('TablatureBundle:Artiste')->findOneByid($id);

        return $this->render('SiteBundle:Site:artisteView.html.twig', array(
            'tablatures' => $tablatures, 'artiste' => $artiste,
        ));
   }

}
