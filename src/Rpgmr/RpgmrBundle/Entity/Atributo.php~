<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Atributo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\AtributoRepository")
 */
class Atributo
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
     * @var string $atributo
     *
     * @ORM\Column(name="atributo", type="string", length=255)
     */
    private $atributo;

    /**
     * @var string $valor
     *
     * @ORM\Column(name="valor", type="string", length=255)
     */
    private $valor;

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
     * Set atributo
     *
     * @param string $atributo
     * @return Atributo
     */
    public function setAtributo($atributo)
    {
        $this->atributo = $atributo;
    
        return $this;
    }

    /**
     * Get atributo
     *
     * @return string 
     */
    public function getAtributo()
    {
        return $this->atributo;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return Atributo
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }
}