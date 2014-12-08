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
    $listTablature = $this->getDoctrine()->getRepository('TablatureBundle:Tablature')->FindAll();

	return $this->render('TablatureBundle::tablatures.html.twig', array(
      'listTablature' => $listTablature
    ));

  } 

  public function tablatureViewAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $tab = $em->getRepository('TablatureBundle:Tablature')->find($id);

        if (!$tab) {
            throw $this->createNotFoundException('Unable to find tablature.');
        }
 
        $tab->setderniereconsultation(new \DateTime());
    	$em->flush();

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
