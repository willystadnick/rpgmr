<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Atributo;
use Rpgmr\RpgmrBundle\Form\AtributoType;

/**
 * Atributo controller.
 *
 * @Route("/atributo")
 */
class AtributoController extends Controller
{
    /**
     * Lists all Atributo entities.
     *
     * @Route("/", name="atributo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Atributo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Atributo entity.
     *
     * @Route("/", name="atributo_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Atributo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Atributo();
        $form = $this->createForm(new AtributoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atributo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Atributo entity.
     *
     * @Route("/new", name="atributo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Atributo();
        $form   = $this->createForm(new AtributoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Atributo entity.
     *
     * @Route("/{id}", name="atributo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Atributo entity.
     *
     * @Route("/{id}/edit", name="atributo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $editForm = $this->createForm(new AtributoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Atributo entity.
     *
     * @Route("/{id}", name="atributo_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Atributo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Atributo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Atributo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AtributoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('atributo_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('personagem_show', array('id' => 5)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Atributo entity.
     *
     * @Route("/{id}", name="atributo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Atributo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Atributo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('atributo'));
    }

    /**
     * Creates a form to delete a Atributo entity by id.
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
