<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Cena
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\CenaRepository")
 */
class Cena
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
     * @var string $titulo
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var datetime $criado
     *
     * @ORM\Column(name="criado", type="datetime")
     */
    private $_criado;

    /**
     * @var datetime $modificado
     *
     * @ORM\Column(name="modificado", type="datetime")
     */
    private $_modificado;

    /**
     * @var datetime $apagado
     *
     * @ORM\Column(name="apagado", type="datetime")
     */
    private $_apagado;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var array $requisitos
     *
     * @ORM\Column(name="requisitos", type="array")
     */
    private $__requisitos;

    /**
     * @var array $acoes
     *
     * @ORM\Column(name="acoes", type="array")
     */
    private $__acoes;

    /**
     * @var Campanha $campanha
     *
     * @ORM\ManyToOne(targetEntity="Campanha", inversedBy="cenas")
     * @ORM\JoinColumn(name="campanha", referencedColumnName="id")
     */
    protected $__campanha;


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
     * Set titulo
     *
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param text $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return text
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set requisitos
     *
     * @param array $requisitos
     */
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;
    }

    /**
     * Get requisitos
     *
     * @return array
     */
    public function getRequisitos()
    {
        return $this->requisitos;
    }

    /**
     * Set campanha
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Campanha $campanha
     * @return Cena
     */
    public function setCampanha(\Rpgmr\RpgmrBundle\Entity\Campanha $campanha = null)
    {
        $this->campanha = $campanha;
    
        return $this;
    }

    /**
     * Get campanha
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Campanha 
     */
    public function getCampanha()
    {
        return $this->campanha;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Cena
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

    /**
     * Set _modificado
     *
     * @param \DateTime $modificado
     * @return Cena
     */
    public function setModificado($modificado)
    {
        $this->_modificado = $modificado;
    
        return $this;
    }

    /**
     * Get _modificado
     *
     * @return \DateTime 
     */
    public function getModificado()
    {
        return $this->_modificado;
    }

    /**
     * Set _apagado
     *
     * @param \DateTime $apagado
     * @return Cena
     */
    public function setApagado($apagado)
    {
        $this->_apagado = $apagado;
    
        return $this;
    }

    /**
     * Get _apagado
     *
     * @return \DateTime 
     */
    public function getApagado()
    {
        return $this->_apagado;
    }

    /**
     * Set __acoes
     *
     * @param array $acoes
     * @return Cena
     */
    public function setAcoes($acoes)
    {
        $this->__acoes = $acoes;
    
        return $this;
    }

    /**
     * Get __acoes
     *
     * @return array 
     */
    public function getAcoes()
    {
        return $this->__acoes;
    }
}