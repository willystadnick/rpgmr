<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Regra;
use Rpgmr\RpgmrBundle\Form\RegraType;

/**
 * Regra controller.
 *
 * @Route("/regra")
 */
class RegraController extends Controller
{
    /**
     * Lists all Regra entities.
     *
     * @Route("/", name="regra")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Regra')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Regra entity.
     *
     * @Route("/", name="regra_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Regra:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Regra();
        $form = $this->createForm(new RegraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regra_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Regra entity.
     *
     * @Route("/new", name="regra_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Regra();
        $form   = $this->createForm(new RegraType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Regra entity.
     *
     * @Route("/{id}", name="regra_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Regra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Regra entity.
     *
     * @Route("/{id}/edit", name="regra_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Regra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regra entity.');
        }

        $editForm = $this->createForm(new RegraType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Regra entity.
     *
     * @Route("/{id}", name="regra_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Regra:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Regra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RegraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regra_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Regra entity.
     *
     * @Route("/{id}", name="regra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Regra')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Regra entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regra'));
    }

    /**
     * Creates a form to delete a Regra entity by id.
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
