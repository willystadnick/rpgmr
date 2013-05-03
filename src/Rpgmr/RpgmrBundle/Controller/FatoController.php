<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Fato;
use Rpgmr\RpgmrBundle\Form\FatoType;

/**
 * Fato controller.
 *
 * @Route("/fato")
 */
class FatoController extends Controller
{
    /**
     * Lists all Fato entities.
     *
     * @Route("/", name="fato")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Fato')->findBy(array(), array("_criado" => "DESC"));

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Fato entity.
     *
     * @Route("/", name="fato_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Fato:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Fato();
        $form = $this->createForm(new FatoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fato_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Registers a new Fato entity.
     *
     * @Route("/register/{autor}/{assunto}/{descricao}/{redirect}/{data}/{flash}", name="fato_register")
     * @Method("GET")
     * @Template()
     */
    public function registerAction($autor, $assunto, $descricao, $redirect, $data, $flash = false)
    {
        $entity  = new Fato();
        $entity->setAutor($autor);
        $entity->setAssunto($assunto);
        $entity->setDescricao($descricao);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
        
        if ($flash)
            $this->get('session')->getFlashBag()->add('notice', $flash);

        if (!is_array($data)) {
            $data = explode(";", $data);
            foreach($data as $tuple) {
                list($key, $value) = explode(":", $tuple);
                $parameters[$key] = $value;
            }
        } else {
            $parameters = $data;
        }
        
        return $this->redirect($this->generateUrl($redirect, $parameters));
    }

    /**
     * Displays a form to create a new Fato entity.
     *
     * @Route("/new", name="fato_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fato();
        $form   = $this->createForm(new FatoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Fato entity.
     *
     * @Route("/{id}", name="fato_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Fato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Fato entity.
     *
     * @Route("/{id}/edit", name="fato_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Fato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fato entity.');
        }

        $editForm = $this->createForm(new FatoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Fato entity.
     *
     * @Route("/{id}", name="fato_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Fato:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Fato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FatoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fato_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Fato entity.
     *
     * @Route("/{id}", name="fato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Fato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fato'));
    }

    /**
     * Creates a form to delete a Fato entity by id.
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
