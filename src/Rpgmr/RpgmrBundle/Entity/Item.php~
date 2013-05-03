<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var integer $qualidade
     *
     * @ORM\Column(name="qualidade", type="integer")
     */
    private $qualidade;


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
     * Set nome
     *
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * Set qualidade
     *
     * @param integer $qualidade
     */
    public function setQualidade($qualidade)
    {
        $this->qualidade = $qualidade;
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
}