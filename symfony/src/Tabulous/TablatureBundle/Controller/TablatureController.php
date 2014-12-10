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

  protected function getUploadDir()
  {
      // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
      // le document/image dans la vue.
      return '..\src\Tabulous\TablatureBundle\Resources\tablature';
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
        $tablatures = file($this->getUploadDir().$tab->getadressefichier());
        return $this->render('SiteBundle:Site:view.html.twig', array(
            'tab' => $tab, 'affichage' => $tablatures
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
