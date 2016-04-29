<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bizikleta
 *
 * @ORM\Table(name="bizikleta")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BizikletaRepository")
 */
class Bizikleta
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
     * @ORM\Column(name="kodea", type="string", length=10, nullable=true, unique=true)
     */
    private $kodea;

    /**
     * @var string
     *
     * @ORM\Column(name="erregistroa", type="string", length=10, nullable=true, unique=true)
     */
    private $erregistroa;

    /**
     * @var string
     *
     * @ORM\Column(name="bastidorea", type="string", length=10, nullable=true, unique=true)
     */
    private $bastidorea;

    /**
     * @var string
     *
     * @ORM\Column(name="ezaugarriak", type="string", length=255, nullable=true)
     */
    private $ezaugarriak;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alokatua", type="boolean", nullable=true)
     */
    private $alokatua;

    /**
     * @var string
     *
     * @ORM\Column(name="oharrak2", type="text", nullable=true)
     */
    private $oharrak;

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
     * Gunea.
     *
     * @var Guneak
     * @ORM\ManyToOne(targetEntity="Guneak", inversedBy="bizikletak")
     */
    protected $gunea;

    /**
     * @var Maileguak
     * @ORM\OneToMany(targetEntity="Maileguak", mappedBy="bizikleta", cascade={"remove"})
     */
    protected $maileguak;

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
        $this->alokatua = false;
    }

    public function __toString()
    {
        return $this->getKodea();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set kodea
     *
     * @param string $kodea
     *
     * @return Bizikleta
     */
    public function setKodea($kodea)
    {
        $this->kodea = $kodea;

        return $this;
    }

    /**
     * Get kodea
     *
     * @return string
     */
    public function getKodea()
    {
        return $this->kodea;
    }

    /**
     * Set erregistroa
     *
     * @param string $erregistroa
     *
     * @return Bizikleta
     */
    public function setErregistroa($erregistroa)
    {
        $this->erregistroa = $erregistroa;

        return $this;
    }

    /**
     * Get erregistroa
     *
     * @return string
     */
    public function getErregistroa()
    {
        return $this->erregistroa;
    }

    /**
     * Set bastidorea
     *
     * @param string $bastidorea
     *
     * @return Bizikleta
     */
    public function setBastidorea($bastidorea)
    {
        $this->bastidorea = $bastidorea;

        return $this;
    }

    /**
     * Get bastidorea
     *
     * @return string
     */
    public function getBastidorea()
    {
        return $this->bastidorea;
    }

    /**
     * Set ezaugarriak
     *
     * @param string $ezaugarriak
     *
     * @return Bizikleta
     */
    public function setEzaugarriak($ezaugarriak)
    {
        $this->ezaugarriak = $ezaugarriak;

        return $this;
    }

    /**
     * Get ezaugarriak
     *
     * @return string
     */
    public function getEzaugarriak()
    {
        return $this->ezaugarriak;
    }

    /**
     * Set oharrak
     *
     * @param string $oharrak
     *
     * @return Bizikleta
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
     * Set oharrak2
     *
     * @param string $oharrak2
     *
     * @return Bizikleta
     */
    public function setOharrak2($oharrak2)
    {
        $this->oharrak2 = $oharrak2;

        return $this;
    }

    /**
     * Get oharrak2
     *
     * @return string
     */
    public function getOharrak2()
    {
        return $this->oharrak2;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Bizikleta
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
     * @return Bizikleta
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
     * Set gunea
     *
     * @param \AppBundle\Entity\Guneak $gunea
     *
     * @return Bizikleta
     */
    public function setGunea(\AppBundle\Entity\Guneak $gunea = null)
    {
        $this->gunea = $gunea;

        return $this;
    }

    /**
     * Get gunea
     *
     * @return \AppBundle\Entity\Guneak
     */
    public function getGunea()
    {
        return $this->gunea;
    }

    /**
     * Add maileguak
     *
     * @param \AppBundle\Entity\Maileguak $maileguak
     *
     * @return Bizikleta
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
     * Set alokatua
     *
     * @param boolean $alokatua
     *
     * @return Bizikleta
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
}
