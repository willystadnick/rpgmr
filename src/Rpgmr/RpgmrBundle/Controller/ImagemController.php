<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Imagem;
use Rpgmr\RpgmrBundle\Form\ImagemType;

/**
 * Imagem controller.
 *
 * @Route("/imagem")
 */
class ImagemController extends Controller
{
    /**
     * Lists all Imagem entities.
     *
     * @Route("/", name="imagem")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Imagem')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Imagem entity.
     *
     * @Route("/", name="imagem_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Imagem:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Imagem();
        $form = $this->createForm(new ImagemType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagem_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Imagem entity.
     *
     * @Route("/new", name="imagem_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Imagem();
        $form   = $this->createForm(new ImagemType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Imagem entity.
     *
     * @Route("/{id}", name="imagem_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Imagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Imagem entity.
     *
     * @Route("/{id}/edit", name="imagem_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Imagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagem entity.');
        }

        $editForm = $this->createForm(new ImagemType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Imagem entity.
     *
     * @Route("/{id}", name="imagem_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Imagem:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Imagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Imagem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ImagemType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagem_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Imagem entity.
     *
     * @Route("/{id}", name="imagem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Imagem')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Imagem entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('imagem'));
    }

    /**
     * Creates a form to delete a Imagem entity by id.
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
