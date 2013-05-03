<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Fato
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\FatoRepository")
 */
class Fato
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
     * @var string $__autor
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $__autor;

    /**
     * @var string $__assunto
     *
     * @ORM\Column(name="assunto", type="string", length=255)
     */
    private $__assunto;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var datetime $_criado
     *
     * @ORM\Column(name="criado", type="datetime")
     */
    private $_criado;

    public function __construct()
    {
        $this->setCriado(new \DateTime());
    }

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
     * Set __autor
     *
     * @param string $autor
     * @return Fato
     */
    public function setAutor($autor)
    {
        $this->__autor = $autor;
    
        return $this;
    }

    /**
     * Get __autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->__autor;
    }

    /**
     * Set __assunto
     *
     * @param string $assunto
     * @return Fato
     */
    public function setAssunto($assunto)
    {
        $this->__assunto = $assunto;
    
        return $this;
    }

    /**
     * Get __assunto
     *
     * @return string 
     */
    public function getAssunto()
    {
        return $this->__assunto;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Fato
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Fato
     */
    public function setCriado($criado)
    {
        $this->_criado = $criado;
    
        return $this;
    }

    /**
     * Get _criado
     *
     * @return \DateTime 
     */
    public function getCriado()
    {
        return $this->_criado;
    }
}