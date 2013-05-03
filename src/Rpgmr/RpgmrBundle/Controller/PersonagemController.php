<?php

namespace Rpgmr\RpgmrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rpgmr\RpgmrBundle\Entity\Personagem;
use Rpgmr\RpgmrBundle\Form\PersonagemType;
use Rpgmr\RpgmrBundle\Form\PersonagemDescricaoType;
    
define("QUALIDADE", 100);
define("CAPACIDADE", 100);

/**
 * Personagem controller.
 *
 * @Route("/personagem")
 */
class PersonagemController extends Controller
{
    /**
     * Lists all Personagem entities.
     *
     * @Route("/", name="personagem")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RpgmrBundle:Personagem')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Personagem entity.
     *
     * @Route("/", name="personagem_create")
     * @Method("POST")
     * @Template("RpgmrBundle:Personagem:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Personagem();
        $form = $this->createForm(new PersonagemType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $autor  = new Personagem();
            
            return $this->forward('RpgmrBundle:Fato:register', array(
                'autor'  => $autor->__toDb(),
                'assunto' => $entity->__toDb(),
                'descricao' => 'criou o personagem',
                'redirect' => 'personagem_show',
                'data' => array('id' => $entity->getId()),
            ));
        }
        
        die(var_dump($form->getErrors()));

//        return array(
//            'nome' => "nome",
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        );
    }

    /**
     * Displays a form to create a new Personagem entity.
     *
     * @Route("/new", name="personagem_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Personagem();
        $form   = $this->createForm(new PersonagemType(), $entity);

        $content = htmlentities(file_get_contents('http://onerandomname.com/'));
        $matches = array();
        preg_match("/randomname.+;([a-zA-Z]+)\s([a-zA-Z]+)/", $content, $matches);
        $nome = $matches ? implode(" ", array_slice($matches, 1)) : "Carl Sagan";
        
        return array(
            'nome' => $nome,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Personagem entity.
     *
     * @Route("/{id}", name="personagem_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Personagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personagem entity.');
        }

        $atributos = $em->getRepository('RpgmrBundle:Atributo')->findAll();
        $itens = $em->getRepository('RpgmrBundle:Item')->findAll();
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'atributos'   => $atributos,
            'itens'       => $itens,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Personagem entity.
     *
     * @Route("/{id}/edit", name="personagem_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Personagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personagem entity.');
        }

        $editForm = $this->createForm(new PersonagemType(), $entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Displays a form to delete an existing Personagem entity.
     *
     * @Route("/{id}/delete", name="personagem_delete")
     * @Method("GET")
     * @Template()
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Personagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personagem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Personagem entity.
     *
     * @Route("/{id}", name="personagem_update")
     * @Method("PUT")
     * @Template("RpgmrBundle:Personagem:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RpgmrBundle:Personagem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personagem entity.');
        }

        $editForm = $this->createForm(new PersonagemType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            $user = $em->getRepository('RpgmrBundle:Usuario')->find(1);
            
            return $this->redirect($this->generateUrl('fato_register', array(
                'autor'     => "Usuario:{$user->getId()}", //@FIXME
                'assunto'   => "Personagem:{$entity->getId()}",
                'descricao' => "alterou o personagem",
                'redirect'  => 'personagem_show',
                'data' => "id:{$entity->getId()}",
                'flash' => "Personagem alterado com sucesso!",
            )));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Deletes a Personagem entity.
     *
     * @Route("/{id}", name="personagem_remove")
     * @Method("DELETE")
     */
    public function removeAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RpgmrBundle:Personagem')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personagem entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            
            return $this->redirect($this->generateUrl('fato_register', array(
                'autor'     => 'Usuario:1', //@FIXME
                'assunto'   => "Personagem:{$id}",
                'descricao' => 'Fulano apagou o personagem Sicrano',
                'redirect'  => 'personagem',
                'data'      => ":",
                'flash'     => "Personagem apagado com sucesso!",

            )));
        }

        return $this->redirect($this->generateUrl('personagem'));
    }

    /**
     * Creates a form to delete a Personagem entity by id.
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
