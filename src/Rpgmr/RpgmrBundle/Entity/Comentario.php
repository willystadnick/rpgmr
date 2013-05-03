<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Comentario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\ComentarioRepository")
 */
class Comentario
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var object $objeto
     *
     * @ORM\Column(name="objeto", type="object")
     */
    private $objeto;

    /**
     * @var text $comentario
     *
     * @ORM\Column(name="comentario", type="text")
     */
    private $comentario;

    /**
     * @var Usuario $usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     **/
    private $usuario;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set objeto
     *
     * @param object $objeto
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;
    }

    /**
     * Get objeto
     *
     * @return object
     */
    public function getObjeto()
    {
        return $this->objeto;
    }

    /**
     * Set comentario
     *
     * @param text $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * Get comentario
     *
     * @return text
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set usuario
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Usuario $usuario
     * @return Comentario
     */
    public function setUsuario(\Rpgmr\RpgmrBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}