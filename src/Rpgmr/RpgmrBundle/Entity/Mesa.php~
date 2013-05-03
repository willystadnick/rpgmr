<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Mesa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\MesaRepository")
 */
class Mesa
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
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var array $regras
     *
     * @ORM\Column(name="regras", type="array")
     */
    private $__regras;

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
     * @var Usuario $mestre
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="mesas")
     * @ORM\JoinColumn(name="mestre", referencedColumnName="id")
     */
    protected $__mestre;

    /**
     * @var CampanhaRepository $personagens
     *
     * @ORM\OneToMany(targetEntity="Campanha", mappedBy="mesa")
     */
    protected $__campanhas;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__campanhas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     * @return Mesa
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
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
     * @param string $descricao
     * @return Mesa
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
     * Set __regras
     *
     * @param array $regras
     * @return Mesa
     */
    public function setRegras($regras)
    {
        $this->__regras = $regras;
    
        return $this;
    }

    /**
     * Get __regras
     *
     * @return array 
     */
    public function getRegras()
    {
        return $this->__regras;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Mesa
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
     * @return Mesa
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
     * @return Mesa
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
     * Set __mestre
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Usuario $mestre
     * @return Mesa
     */
    public function setMestre(\Rpgmr\RpgmrBundle\Entity\Usuario $mestre = null)
    {
        $this->__mestre = $mestre;
    
        return $this;
    }

    /**
     * Get __mestre
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Usuario 
     */
    public function getMestre()
    {
        return $this->__mestre;
    }

    /**
     * Add __campanhas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Campanha $campanhas
     * @return Mesa
     */
    public function addCampanha(\Rpgmr\RpgmrBundle\Entity\Campanha $campanhas)
    {
        $this->__campanhas[] = $campanhas;
    
        return $this;
    }

    /**
     * Remove __campanhas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Campanha $campanhas
     */
    public function removeCampanha(\Rpgmr\RpgmrBundle\Entity\Campanha $campanhas)
    {
        $this->__campanhas->removeElement($campanhas);
    }

    /**
     * Get __campanhas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampanhas()
    {
        return $this->__campanhas;
    }
}