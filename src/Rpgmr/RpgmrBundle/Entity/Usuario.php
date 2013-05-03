<?php

namespace Rpgmr\RpgmrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rpgmr\RpgmrBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rpgmr\RpgmrBundle\Entity\UsuarioRepository")
 */
class Usuario
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
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string $senha
     *
     * @ORM\Column(name="senha", type="string", length=255)
     */
    private $senha;

    /**
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var integer $credito
     *
     * @ORM\Column(name="credito", type="integer")
     */
    private $credito;

    /**
     * @var datetime $_criado
     *
     * @ORM\Column(name="criado", type="datetime")
     */
    private $_criado;

    /**
     * @var datetime $_modificado
     *
     * @ORM\Column(name="modificado", type="datetime", nullable=true)
     */
    private $_modificado;

    /**
     * @var datetime $_apagado
     *
     * @ORM\Column(name="apagado", type="datetime", nullable=true)
     */
    private $_apagado;

    /**
     * @var PersonagemRepository $personagens
     *
     * @ORM\OneToMany(targetEntity="Personagem", mappedBy="usuario")
     */
    protected $__personagens;

    /**
     * @ORM\OneToMany(targetEntity="Mesa", mappedBy="mestre")
     */
    protected $__mesas;

    public function __construct()
    {
        $this->personagens = new ArrayCollection();
        $this->mesas = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNome();
    }

    public function __toDb()
    {
        return "Usuario:" . $this->getId();
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
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    
        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
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
     * Set credito
     *
     * @param integer $credito
     * @return Usuario
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;
    
        return $this;
    }

    /**
     * Get credito
     *
     * @return integer 
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set _criado
     *
     * @param \DateTime $criado
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Add __personagens
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Personagem $personagens
     * @return Usuario
     */
    public function addPersonagen(\Rpgmr\RpgmrBundle\Entity\Personagem $personagens)
    {
        $this->__personagens[] = $personagens;
    
        return $this;
    }

    /**
     * Remove __personagens
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Personagem $personagens
     */
    public function removePersonagen(\Rpgmr\RpgmrBundle\Entity\Personagem $personagens)
    {
        $this->__personagens->removeElement($personagens);
    }

    /**
     * Get __personagens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonagens()
    {
        return $this->__personagens;
    }

    /**
     * Add __mesas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Mesa $mesas
     * @return Usuario
     */
    public function addMesa(\Rpgmr\RpgmrBundle\Entity\Mesa $mesas)
    {
        $this->__mesas[] = $mesas;
    
        return $this;
    }

    /**
     * Remove __mesas
     *
     * @param \Rpgmr\RpgmrBundle\Entity\Mesa $mesas
     */
    public function removeMesa(\Rpgmr\RpgmrBundle\Entity\Mesa $mesas)
    {
        $this->__mesas->removeElement($mesas);
    }

    /**
     * Get __mesas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesas()
    {
        return $this->__mesas;
    }
}