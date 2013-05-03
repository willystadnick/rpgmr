<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Campanha;
use Rpgmr\RpgmrBundle\Form\CampanhaType;

/**
 * Campanha controller.
 *
 * @Route("/campanha")
 */
class CampanhaController extends Controller
{
    /**
     * Lists all Campanha entities.
     *
     * @Route("/", name="campanha")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Campanha')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Campanha entity.
     *
     * @Route("/", name="campanha_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Campanha:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Campanha();
        $form = $this->createForm(new CampanhaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('campanha_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Campanha entity.
     *
     * @Route("/new", name="campanha_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Campanha();
        $form   = $this->createForm(new CampanhaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Campanha entity.
     *
     * @Route("/{id}", name="campanha_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Campanha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campanha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Campanha entity.
     *
     * @Route("/{id}/edit", name="campanha_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Campanha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campanha entity.');
        }

        $editForm = $this->createForm(new CampanhaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Campanha entity.
     *
     * @Route("/{id}", name="campanha_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Campanha:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Campanha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campanha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CampanhaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('campanha_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Campanha entity.
     *
     * @Route("/{id}", name="campanha_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Campanha')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Campanha entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campanha'));
    }

    /**
     * Creates a form to delete a Campanha entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
