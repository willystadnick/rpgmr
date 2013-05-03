<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Modificador;
use Rpgmr\RpgmrBundle\Form\ModificadorType;

/**
 * Modificador controller.
 *
 * @Route("/modificador")
 */
class ModificadorController extends Controller
{
    /**
     * Lists all Modificador entities.
     *
     * @Route("/", name="modificador")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Modificador')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Modificador entity.
     *
     * @Route("/", name="modificador_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Modificador:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Modificador();
        $form = $this->createForm(new ModificadorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modificador_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Modificador entity.
     *
     * @Route("/new", name="modificador_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Modificador();
        $form   = $this->createForm(new ModificadorType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Modificador entity.
     *
     * @Route("/{id}", name="modificador_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Modificador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modificador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Modificador entity.
     *
     * @Route("/{id}/edit", name="modificador_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Modificador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modificador entity.');
        }

        $editForm = $this->createForm(new ModificadorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Modificador entity.
     *
     * @Route("/{id}", name="modificador_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Modificador:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Modificador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modificador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ModificadorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modificador_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Modificador entity.
     *
     * @Route("/{id}", name="modificador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Modificador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Modificador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('modificador'));
    }

    /**
     * Creates a form to delete a Modificador entity by id.
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
