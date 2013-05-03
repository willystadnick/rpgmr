<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Acao
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\AcaoRepository")
 */
class Acao
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
     * @var object $origem
     *
     * @ORM\Column(name="origem", type="object")
     */
    private $__origem;

    /**
     * @var text $acao
     *
     * @ORM\Column(name="acao", type="text")
     */
    private $acao;

    /**
     * @var array $anexos
     *
     * @ORM\Column(name="anexos", type="array")
     */
    private $__anexos;

    /**
     * @var Resultado $resultado
     *
     * @ORM\OneToOne(targetEntity="Resultado", mappedBy="resultado")
     * @ORM\JoinColumn(name="resultado", referencedColumnName="id")
     **/
    private $__resultado;

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
     * @var Personagem $personagem
     *
     * @ORM\ManyToOne(targetEntity="Personagem")
     * @ORM\JoinColumn(name="personagem", referencedColumnName="id")
     **/
    private $__personagem;


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
     * Set origem
     *
     * @param object $origem
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    /**
     * Get origem
     *
     * @return object
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * Set acao
     *
     * @param text $acao
     */
    public function setAcao($acao)
    {
        $this->acao = $acao;
    }

    /**
     * Get acao
     *
     * @return text
     */
    public function getAcao()
    {
        return $this->acao;
    }

    /**
     * Set anexo
     *
     * @param array $anexo
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;
    }

    /**
     * Get anexo
     *
     * @return array
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set resultado
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Resultado $resultado
     * @return Acao
     */
    public function setResultado(\Rpgmr\RpgmrBundle\Entity\Resultado $resultado = null)
    {
        $this->resultado = $resultado;
    
        return $this;
    }

    /**
     * Get resultado
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Resultado 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set personagem
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Personagem $personagem
     * @return Acao
     */
    public function setPersonagem(\Rpgmr\RpgmrBundle\Entity\Personagem $personagem = null)
    {
        $this->personagem = $personagem;
    
        return $this;
    }

    /**
     * Get personagem
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Personagem 
     */
    public function getPersonagem()
    {
        return $this->personagem;
    }

    /**
     * Set __anexos
     *
     * @param array $anexos
     * @return Acao
     */
    public function setAnexos($anexos)
    {
        $this->__anexos = $anexos;
    
        return $this;
    }

    /**
     * Get __anexos
     *
     * @return array 
     */
    public function getAnexos()
    {
        return $this->__anexos;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Acao
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
     * @return Acao
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
     * @return Acao
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