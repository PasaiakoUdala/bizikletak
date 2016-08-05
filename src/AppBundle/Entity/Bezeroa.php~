<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bezeroa
 *
 * @ORM\Table(name="bezeroa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BezeroaRepository")
 */
class Bezeroa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="izena", type="string", length=255)
     */
    private $izena;

    /**
     * @var string
     *
     * @ORM\Column(name="nan", type="string", length=9, unique=true)
     */
    private $nan;

    /**
     * @var bool
     *
     * @ORM\Column(name="bazkidea", type="boolean", nullable=true)
     */
    private $bazkidea;

    /**
     * @var bool
     *
     * @ORM\Column(name="ordainketa", type="boolean", nullable=true)
     */
    private $ordainketa;

    /**
     * @var bool
     *
     * @ORM\Column(name="pasaitarra", type="boolean", nullable=true)
     */
    private $pasaitarra;

    /**
     * @var bool
     *
     * @ORM\Column(name="alokairua", type="boolean", nullable=true)
     */
    private $alokairua;

    /**
     * @var float
     *
     * @ORM\Column(name="kopurua", type="float", nullable=true)
     */
    private $kopurua = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="kopurua2", type="float", nullable=true)
     */
    private $kopurua2 = 0.0;

    /**
     * @var string
     *
     * @ORM\Column(name="mugikorra", type="string", length=255)
     */
    private $mugikorra;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="helbidea", type="string", length=255, nullable=true)
     */
    private $helbidea;

    /**
     * @var bool
     *
     * @ORM\Column(name="sinatuta", type="boolean", nullable=true)
     */
    private $sinatuta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alokatua", type="boolean", nullable=true)
     */
    private $alokatua;

    /**
     * @var boolean
     *
     * @ORM\Column(name="udallangilea", type="boolean", nullable=true)
     */
    private $udallangilea;

    /**
     * @var boolean
     *
     * @ORM\Column(name="baimenberezia", type="boolean", nullable=true)
     */
    private $baimenberezia;

    /**
     * @var string
     *
     * @ORM\Column(name="oharrak", type="string", length=255, nullable=true)
     */
    private $oharrak;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iraungitze", type="datetime", nullable=true)
     */
    private $iraungitze;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */

    /**
     * @var Maileguak
     * @ORM\OneToMany(targetEntity="Maileguak", mappedBy="bezeroa", cascade={"remove"})
     */
    protected $maileguak;

    /**
     * @var Zigorra
     * @ORM\OneToMany(targetEntity="Zigorra", mappedBy="bezeroa", cascade={"remove"})
     */
    protected $zigorrak;

    /**
     * @var BezeroZigorra
     * @ORM\OneToMany(targetEntity="BezeroZigorra", mappedBy="bezeroa", cascade={"remove"})
     */
    protected $bezerozigorra;


    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */



    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->iraungitze = null;
    }

    public function __toString()
    {
        return $this->getIzena();
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
     * Set izena
     *
     * @param string $izena
     *
     * @return Bezeroa
     */
    public function setIzena($izena)
    {
        $this->izena = $izena;

        return $this;
    }

    /**
     * Get izena
     *
     * @return string
     */
    public function getIzena()
    {
        return $this->izena;
    }

    /**
     * Set nan
     *
     * @param string $nan
     *
     * @return Bezeroa
     */
    public function setNan($nan)
    {
        $this->nan = $nan;

        return $this;
    }

    /**
     * Get nan
     *
     * @return string
     */
    public function getNan()
    {
        return $this->nan;
    }

    /**
     * Set bazkidea
     *
     * @param boolean $bazkidea
     *
     * @return Bezeroa
     */
    public function setBazkidea($bazkidea)
    {
        $this->bazkidea = $bazkidea;

        return $this;
    }

    /**
     * Get bazkidea
     *
     * @return boolean
     */
    public function getBazkidea()
    {
        return $this->bazkidea;
    }

    /**
     * Set ordainketa
     *
     * @param boolean $ordainketa
     *
     * @return Bezeroa
     */
    public function setOrdainketa($ordainketa)
    {
        $this->ordainketa = $ordainketa;

        return $this;
    }

    /**
     * Get ordainketa
     *
     * @return boolean
     */
    public function getOrdainketa()
    {
        return $this->ordainketa;
    }

    /**
     * Set pasaitarra
     *
     * @param boolean $pasaitarra
     *
     * @return Bezeroa
     */
    public function setPasaitarra($pasaitarra)
    {
        $this->pasaitarra = $pasaitarra;

        return $this;
    }

    /**
     * Get pasaitarra
     *
     * @return boolean
     */
    public function getPasaitarra()
    {
        return $this->pasaitarra;
    }

    /**
     * Set alokairua
     *
     * @param boolean $alokairua
     *
     * @return Bezeroa
     */
    public function setAlokairua($alokairua)
    {
        $this->alokairua = $alokairua;

        return $this;
    }

    /**
     * Get alokairua
     *
     * @return boolean
     */
    public function getAlokairua()
    {
        return $this->alokairua;
    }

    /**
     * Set kopurua
     *
     * @param integer $kopurua
     *
     * @return Bezeroa
     */
    public function setKopurua($kopurua)
    {
        $this->kopurua = $kopurua;

        return $this;
    }

    /**
     * Get kopurua
     *
     * @return integer
     */
    public function getKopurua()
    {
        return $this->kopurua;
    }

    /**
     * Set mugikorra
     *
     * @param string $mugikorra
     *
     * @return Bezeroa
     */
    public function setMugikorra($mugikorra)
    {
        $this->mugikorra = $mugikorra;

        return $this;
    }

    /**
     * Get mugikorra
     *
     * @return string
     */
    public function getMugikorra()
    {
        return $this->mugikorra;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Bezeroa
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
     * Set helbidea
     *
     * @param string $helbidea
     *
     * @return Bezeroa
     */
    public function setHelbidea($helbidea)
    {
        $this->helbidea = $helbidea;

        return $this;
    }

    /**
     * Get helbidea
     *
     * @return string
     */
    public function getHelbidea()
    {
        return $this->helbidea;
    }

    /**
     * Set sinatuta
     *
     * @param boolean $sinatuta
     *
     * @return Bezeroa
     */
    public function setSinatuta($sinatuta)
    {
        $this->sinatuta = $sinatuta;

        return $this;
    }

    /**
     * Get sinatuta
     *
     * @return boolean
     */
    public function getSinatuta()
    {
        return $this->sinatuta;
    }

    /**
     * Set oharrak
     *
     * @param string $oharrak
     *
     * @return Bezeroa
     */
    public function setOharrak($oharrak)
    {
        $this->oharrak = $oharrak;

        return $this;
    }

    /**
     * Get oharrak
     *
     * @return string
     */
    public function getOharrak()
    {
        return $this->oharrak;
    }

    /**
     * Set zigorrak
     *
     * @param string $zigorrak
     *
     * @return Bezeroa
     */
    public function setZigorrak($zigorrak)
    {
        $this->zigorrak = $zigorrak;

        return $this;
    }

    /**
     * Get zigorrak
     *
     * @return string
     */
    public function getZigorrak()
    {
        return $this->zigorrak;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Bezeroa
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Bezeroa
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add maileguak
     *
     * @param \AppBundle\Entity\Maileguak $maileguak
     *
     * @return Bezeroa
     */
    public function addMaileguak(\AppBundle\Entity\Maileguak $maileguak)
    {
        $this->maileguak[] = $maileguak;

        return $this;
    }

    /**
     * Remove maileguak
     *
     * @param \AppBundle\Entity\Maileguak $maileguak
     */
    public function removeMaileguak(\AppBundle\Entity\Maileguak $maileguak)
    {
        $this->maileguak->removeElement($maileguak);
    }

    /**
     * Get maileguak
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaileguak()
    {
        return $this->maileguak;
    }

    /**
     * Add zigorrak
     *
     * @param \AppBundle\Entity\Zigorra $zigorrak
     *
     * @return Bezeroa
     */
    public function addZigorrak(\AppBundle\Entity\Zigorra $zigorrak)
    {
        $this->zigorrak[] = $zigorrak;

        return $this;
    }

    /**
     * Remove zigorrak
     *
     * @param \AppBundle\Entity\Zigorra $zigorrak
     */
    public function removeZigorrak(\AppBundle\Entity\Zigorra $zigorrak)
    {
        $this->zigorrak->removeElement($zigorrak);
    }

    /**
     * Add bezerozigorra
     *
     * @param \AppBundle\Entity\BezeroZigorra $bezerozigorra
     *
     * @return Bezeroa
     */
    public function addBezerozigorra(\AppBundle\Entity\BezeroZigorra $bezerozigorra)
    {
        $this->bezerozigorra[] = $bezerozigorra;

        return $this;
    }

    /**
     * Remove bezerozigorra
     *
     * @param \AppBundle\Entity\BezeroZigorra $bezerozigorra
     */
    public function removeBezerozigorra(\AppBundle\Entity\BezeroZigorra $bezerozigorra)
    {
        $this->bezerozigorra->removeElement($bezerozigorra);
    }

    /**
     * Get bezerozigorra
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBezerozigorra()
    {
        return $this->bezerozigorra;
    }

    /**
     * Set alokatua
     *
     * @param boolean $alokatua
     *
     * @return Bezeroa
     */
    public function setAlokatua($alokatua)
    {
        $this->alokatua = $alokatua;

        return $this;
    }

    /**
     * Get alokatua
     *
     * @return boolean
     */
    public function getAlokatua()
    {
        return $this->alokatua;
    }

    /**
     * Set iraungitze
     *
     * @param \DateTime $iraungitze
     *
     * @return Bezeroa
     */
    public function setIraungitze($iraungitze)
    {
        $this->iraungitze = $iraungitze;

        return $this;
    }

    /**
     * Get iraungitze
     *
     * @return \DateTime
     */
    public function getIraungitze()
    {
        return $this->iraungitze;
    }

    /**
     * Set kopurua2
     *
     * @param float $kopurua2
     *
     * @return Bezeroa
     */
    public function setKopurua2($kopurua2)
    {
        $this->kopurua2 = $kopurua2;

        return $this;
    }

    /**
     * Get kopurua2
     *
     * @return float
     */
    public function getKopurua2()
    {
        return $this->kopurua2;
    }

    /**
     * Set udallangilea
     *
     * @param boolean $udallangilea
     *
     * @return Bezeroa
     */
    public function setUdallangilea($udallangilea)
    {
        $this->udallangilea = $udallangilea;

        return $this;
    }

    /**
     * Get udallangilea
     *
     * @return boolean
     */
    public function getUdallangilea()
    {
        return $this->udallangilea;
    }

    /**
     * Set baimenberezia
     *
     * @param boolean $baimenberezia
     *
     * @return Bezeroa
     */
    public function setBaimenberezia($baimenberezia)
    {
        $this->baimenberezia = $baimenberezia;

        return $this;
    }

    /**
     * Get baimenberezia
     *
     * @return boolean
     */
    public function getBaimenberezia()
    {
        return $this->baimenberezia;
    }
}
