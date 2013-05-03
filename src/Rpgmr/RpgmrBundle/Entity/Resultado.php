<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Resultado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\ResultadoRepository")
 */
class Resultado
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
     * @var text $resultado
     *
     * @ORM\Column(name="resultado", type="text")
     */
    private $resultado;

    /**
     * @var Acao $acao
     *
     * @ORM\OneToOne(targetEntity="Acao", mappedBy="resultado")
     * @ORM\JoinColumn(name="acao", referencedColumnName="id")
     **/
    private $acao;


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
     * Set resultado
     *
     * @param text $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * Get resultado
     *
     * @return text
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set acao
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Acao $acao
     * @return Resultado
     */
    public function setAcao(\Rpgmr\RpgmrBundle\Entity\Acao $acao = null)
    {
        $this->acao = $acao;
    
        return $this;
    }

    /**
     * Get acao
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Acao 
     */
    public function getAcao()
    {
        return $this->acao;
    }
}