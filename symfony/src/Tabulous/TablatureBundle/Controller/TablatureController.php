<?php

namespace Tabulous\TablatureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tabulous\TablatureBundle\Entity\Tablature;
use Tabulous\TablatureBundle\Form\TablatureType;
use Doctrine\ORM\EntityRepository;
// N'oubliez pas ce use
use Doctrine\ORM\QueryBuilder;

/**
 * Tablature controller.
 *
 */
class TablatureController extends Controller
{

    /**
     * Lists all Tablature entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TablatureBundle:Tablature')->findAll();

        return $this->render('TablatureBundle:Tablature:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tablature entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tablature();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tablature_show', array('id' => $entity->getId())));
        }

        return $this->render('TablatureBundle:Tablature:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tablature entity.
     *
     * @param Tablature $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tablature $entity)
    {
        $form = $this->createForm(new TablatureType(), $entity, array(
            'action' => $this->generateUrl('tablature_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tablature entity.
     *
     */
    public function newAction()
    {
        $entity = new Tablature();
        $form   = $this->createCreateForm($entity);

        return $this->render('TablatureBundle:Tablature:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tablature entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TablatureBundle:Tablature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tablature entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TablatureBundle:Tablature:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tablature entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TablatureBundle:Tablature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tablature entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TablatureBundle:Tablature:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tablature entity.
    *
    * @param Tablature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tablature $entity)
    {
        $form = $this->createForm(new TablatureType(), $entity, array(
            'action' => $this->generateUrl('tablature_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tablature entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TablatureBundle:Tablature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tablature entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tablature_edit', array('id' => $id)));
        }

        return $this->render('TablatureBundle:Tablature:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tablature entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TablatureBundle:Tablature')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tablature entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tablature'));
    }

    /**
     * Creates a form to delete a Tablature entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tablature_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
	
	public function listetAction()
	{
		$listTablature = $this->getDoctrine()->getRepository('TablatureBundle:Tablature')->FindAll();

		return $this->render('TablatureBundle::tablatures.html.twig', array(
			'listTablature' => $listTablature
		));

	}

        public function listeaAction()
    {
        $listArtiste = $this->getDoctrine()->getRepository('TablatureBundle:Artiste')->FindAll();

        return $this->render('TablatureBundle::artistes.html.twig', array(
            'listArtiste' => $listArtiste
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
