<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Mesa;
use Rpgmr\RpgmrBundle\Form\MesaType;

/**
 * Mesa controller.
 *
 * @Route("/mesa")
 */
class MesaController extends Controller
{
    /**
     * Lists all Mesa entities.
     *
     * @Route("/", name="mesa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Mesa')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Mesa entity.
     *
     * @Route("/", name="mesa_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Mesa:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Mesa();
        $form = $this->createForm(new MesaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mesa_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Mesa entity.
     *
     * @Route("/new", name="mesa_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Mesa();
        $form   = $this->createForm(new MesaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Mesa entity.
     *
     * @Route("/{id}", name="mesa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Mesa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mesa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Mesa entity.
     *
     * @Route("/{id}/edit", name="mesa_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Mesa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mesa entity.');
        }

        $editForm = $this->createForm(new MesaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Mesa entity.
     *
     * @Route("/{id}", name="mesa_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Mesa:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Mesa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mesa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MesaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mesa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Mesa entity.
     *
     * @Route("/{id}", name="mesa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Mesa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mesa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mesa'));
    }

    /**
     * Creates a form to delete a Mesa entity by id.
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
