<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Negocio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\NegocioRepository")
 */
class Negocio
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
     * @var array $oferta
     *
     * @ORM\Column(name="oferta", type="array")
     */
    private $oferta;

    /**
     * @var array $preco
     *
     * @ORM\Column(name="preco", type="array")
     */
    private $preco;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var Personagem $vendedor
     *
     * @ORM\ManyToOne(targetEntity="Personagem")
     * @ORM\JoinColumn(name="vendedor", referencedColumnName="id")
     **/
    private $vendedor;

    /**
     * @var Personagem $comprador
     *
     * @ORM\ManyToOne(targetEntity="Personagem")
     * @ORM\JoinColumn(name="comprador", referencedColumnName="id")
     **/
    private $comprador;


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
     * Set oferta
     *
     * @param array $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;
    }

    /**
     * Get oferta
     *
     * @return array
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set preco
     *
     * @param array $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * Get preco
     *
     * @return array
     */
    public function getPreco()
    {
        return $this->preco;
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
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set vendedor
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Personagem $vendedor
     * @return Negocio
     */
    public function setVendedor(\Rpgmr\RpgmrBundle\Entity\Personagem $vendedor = null)
    {
        $this->vendedor = $vendedor;
    
        return $this;
    }

    /**
     * Get vendedor
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Personagem 
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * Set comprador
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Personagem $comprador
     * @return Negocio
     */
    public function setComprador(\Rpgmr\RpgmrBundle\Entity\Personagem $comprador = null)
    {
        $this->comprador = $comprador;
    
        return $this;
    }

    /**
     * Get comprador
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Personagem 
     */
    public function getComprador()
    {
        return $this->comprador;
    }
}