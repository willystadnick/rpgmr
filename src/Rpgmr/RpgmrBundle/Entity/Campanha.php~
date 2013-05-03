<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Campanha
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\CampanhaRepository")
 */
class Campanha
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
     * @var CenaRepository $cenas
     *
     * @ORM\OneToMany(targetEntity="Cena", mappedBy="campanha")
     */
    protected $__cenas;


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
     * Constructor
     */
    public function __construct()
    {
        $this->cenas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add cenas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Cena $cenas
     * @return Campanha
     */
    public function addCena(\Rpgmr\RpgmrBundle\Entity\Cena $cenas)
    {
        $this->cenas[] = $cenas;
    
        return $this;
    }

    /**
     * Remove cenas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Cena $cenas
     */
    public function removeCena(\Rpgmr\RpgmrBundle\Entity\Cena $cenas)
    {
        $this->cenas->removeElement($cenas);
    }

    /**
     * Get cenas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCenas()
    {
        return $this->cenas;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Campanha
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
     * @return Campanha
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
     * @return Campanha
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
}