<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Acao;
use Rpgmr\RpgmrBundle\Form\AcaoType;

/**
 * Acao controller.
 *
 * @Route("/acao")
 */
class AcaoController extends Controller
{
    /**
     * Lists all Acao entities.
     *
     * @Route("/", name="acao")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Acao')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Acao entity.
     *
     * @Route("/", name="acao_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Acao:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Acao();
        $form = $this->createForm(new AcaoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('acao_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Acao entity.
     *
     * @Route("/new", name="acao_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Acao();
        $form   = $this->createForm(new AcaoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Acao entity.
     *
     * @Route("/{id}", name="acao_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Acao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acao entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Acao entity.
     *
     * @Route("/{id}/edit", name="acao_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Acao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acao entity.');
        }

        $editForm = $this->createForm(new AcaoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Acao entity.
     *
     * @Route("/{id}", name="acao_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Acao:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Acao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acao entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AcaoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('acao_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Acao entity.
     *
     * @Route("/{id}", name="acao_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Acao')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Acao entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('acao'));
    }

    /**
     * Creates a form to delete a Acao entity by id.
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
