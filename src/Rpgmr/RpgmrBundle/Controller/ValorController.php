<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Valor;
use Rpgmr\RpgmrBundle\Form\ValorType;

/**
 * Valor controller.
 *
 * @Route("/valor")
 */
class ValorController extends Controller
{
    /**
     * Lists all Valor entities.
     *
     * @Route("/", name="valor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Valor')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Valor entity.
     *
     * @Route("/", name="valor_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Valor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Valor();
        $form = $this->createForm(new ValorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Valor entity.
     *
     * @Route("/new", name="valor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Valor();
        $form   = $this->createForm(new ValorType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Valor entity.
     *
     * @Route("/{id}", name="valor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Valor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Valor entity.
     *
     * @Route("/{id}/edit", name="valor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Valor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valor entity.');
        }

        $editForm = $this->createForm(new ValorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Valor entity.
     *
     * @Route("/{id}", name="valor_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Valor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Valor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ValorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Valor entity.
     *
     * @Route("/{id}", name="valor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Valor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Valor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('valor'));
    }

    /**
     * Creates a form to delete a Valor entity by id.
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
