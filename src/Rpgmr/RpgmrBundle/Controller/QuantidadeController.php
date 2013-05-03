<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Quantidade;
use Rpgmr\RpgmrBundle\Form\QuantidadeType;

/**
 * Quantidade controller.
 *
 * @Route("/quantidade")
 */
class QuantidadeController extends Controller
{
    /**
     * Lists all Quantidade entities.
     *
     * @Route("/", name="quantidade")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Quantidade')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Quantidade entity.
     *
     * @Route("/", name="quantidade_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Quantidade:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Quantidade();
        $form = $this->createForm(new QuantidadeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quantidade_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Quantidade entity.
     *
     * @Route("/new", name="quantidade_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Quantidade();
        $form   = $this->createForm(new QuantidadeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Quantidade entity.
     *
     * @Route("/{id}", name="quantidade_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Quantidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quantidade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Quantidade entity.
     *
     * @Route("/{id}/edit", name="quantidade_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Quantidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quantidade entity.');
        }

        $editForm = $this->createForm(new QuantidadeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Quantidade entity.
     *
     * @Route("/{id}", name="quantidade_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Quantidade:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Quantidade')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quantidade entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new QuantidadeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quantidade_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Quantidade entity.
     *
     * @Route("/{id}", name="quantidade_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Quantidade')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Quantidade entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quantidade'));
    }

    /**
     * Creates a form to delete a Quantidade entity by id.
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
