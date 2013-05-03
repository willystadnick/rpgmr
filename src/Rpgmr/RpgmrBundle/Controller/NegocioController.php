<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Negocio;
use Rpgmr\RpgmrBundle\Form\NegocioType;

/**
 * Negocio controller.
 *
 * @Route("/negocio")
 */
class NegocioController extends Controller
{
    /**
     * Lists all Negocio entities.
     *
     * @Route("/", name="negocio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Negocio')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Negocio entity.
     *
     * @Route("/", name="negocio_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Negocio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Negocio();
        $form = $this->createForm(new NegocioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('negocio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Negocio entity.
     *
     * @Route("/new", name="negocio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Negocio();
        $form   = $this->createForm(new NegocioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Negocio entity.
     *
     * @Route("/{id}", name="negocio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Negocio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Negocio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Negocio entity.
     *
     * @Route("/{id}/edit", name="negocio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Negocio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Negocio entity.');
        }

        $editForm = $this->createForm(new NegocioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Negocio entity.
     *
     * @Route("/{id}", name="negocio_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Negocio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Negocio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Negocio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new NegocioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('negocio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Negocio entity.
     *
     * @Route("/{id}", name="negocio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Negocio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Negocio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('negocio'));
    }

    /**
     * Creates a form to delete a Negocio entity by id.
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
