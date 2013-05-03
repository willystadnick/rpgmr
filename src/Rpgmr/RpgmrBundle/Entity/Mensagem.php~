<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpgmr\RpgmrBundle\Entity\Mensagem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\MensagemRepository")
 */
class Mensagem
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
     * @var integer $tipo
     *
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var object $anexo
     *
     * @ORM\Column(name="anexo", type="object")
     */
    private $anexo;

    /**
     * @var text $mensagem
     *
     * @ORM\Column(name="mensagem", type="text")
     */
    private $mensagem;

    /**
     * @var integer $status
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var Usuario $remetente
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="remetente", referencedColumnName="id")
     */
    protected $remetente;

    /**
     * @var Usuario $destinatario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="destinatario", referencedColumnName="id")
     */
    protected $destinatario;


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
     * Set tipo
     *
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set mensagem
     *
     * @param text $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * Get mensagem
     *
     * @return text
     */
    public function getMensagem()
    {
        return $this->mensagem;
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
     * Set anexo
     *
     * @param \stdClass $anexo
     * @return Mensagem
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;
    
        return $this;
    }

    /**
     * Get anexo
     *
     * @return \stdClass 
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set remetente
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Usuario $remetente
     * @return Mensagem
     */
    public function setRemetente(\Rpgmr\RpgmrBundle\Entity\Usuario $remetente = null)
    {
        $this->remetente = $remetente;
    
        return $this;
    }

    /**
     * Get remetente
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Usuario 
     */
    public function getRemetente()
    {
        return $this->remetente;
    }

    /**
     * Set destinatario
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Usuario $destinatario
     * @return Mensagem
     */
    public function setDestinatario(\Rpgmr\RpgmrBundle\Entity\Usuario $destinatario = null)
    {
        $this->destinatario = $destinatario;
    
        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \Rpgmr\RpgmrBundle\Entity\Usuario 
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }
}