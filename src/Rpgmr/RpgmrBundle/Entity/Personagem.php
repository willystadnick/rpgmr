<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Personagem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\PersonagemRepository")
 */
class Personagem
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
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var integer $qualidade
     *
     * @ORM\Column(name="qualidade", type="integer", nullable=true)
     */
    private $qualidade;

    /**
     * @var text $atributos
     *
     * @ORM\Column(name="atributos", type="text", nullable=true)
     */
    private $__atributos;

    /**
     * @var integer $capacidade
     *
     * @ORM\Column(name="capacidade", type="integer", nullable=true)
     */
    private $capacidade;

    /**
     * @var text $itens
     *
     * @ORM\Column(name="itens", type="text", nullable=true)
     */
    private $__itens;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="personagens")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    protected $__usuario;

    public function __toDb()
    {
        return "Personagem:" . $this->getId();
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
     * Get hasQualidade
     *
     * @return boolean 
     */
    public function hasQualidade()
    {
        return true;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Personagem
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Personagem
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
     * Set qualidade
     *
     * @param integer $qualidade
     * @return Personagem
     */
    public function setQualidade($qualidade)
    {
        $this->qualidade = $qualidade;
    
        return $this;
    }

    /**
     * Get qualidade
     *
     * @return integer 
     */
    public function getQualidade()
    {
        return $this->qualidade;
    }

    /**
     * Set __atributos
     *
     * @param array $atributos
     * @return Personagem
     */
    public function setAtributos($atributos)
    {
        $this->__atributos = $atributos;
    
        return $this;
    }

    /**
     * Get __atributos
     *
     * @return array 
     */
    public function getAtributos()
    {
        return $this->__atributos;
    }

    /**
     * Set capacidade
     *
     * @param integer $capacidade
     * @return Personagem
     */
    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;
    
        return $this;
    }

    /**
     * Get capacidade
     *
     * @return integer 
     */
    public function getCapacidade()
    {
        return $this->capacidade;
    }

    /**
     * Set __itens
     *
     * @param array $itens
     * @return Personagem
     */
    public function setItens($itens)
    {
        $this->__itens = $itens;
    
        return $this;
    }

    /**
     * Get __itens
     *
     * @return array 
     */
    public function getItens()
    {
        return $this->__itens;
    }

    /**
     * Set __usuario
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Usuario $usuario
     * @return Personagem
     */
    public function setUsuario(\Rpgmr\RpgmrBundle\Entity\Usuario $usuario = null)
    {
        $this->__usuario = $usuario;
    
        return $this;
    }

    /**
     * Get __usuario
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->__usuario;
    }
}