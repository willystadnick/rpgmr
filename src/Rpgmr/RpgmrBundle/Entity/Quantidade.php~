<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Quantidade
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\QuantidadeRepository")
 */
class Quantidade
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
     * @var float $quantidade
     *
     * @ORM\Column(name="quantidade", type="float")
     */
    private $quantidade;


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
     * Set quantidade
     *
     * @param float $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * Get quantidade
     *
     * @return float 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }
}