<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Maileguak
 *
 * @ORM\Table(name="maileguak")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaileguakRepository")
 */
class Maileguak
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
     * @var \DateTime
     *
     * @ORM\Column(name="fetxa_hasi", type="datetime")
     */
    private $fetxa_hasi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fetxa_amaitu", type="datetime", nullable=true)
     */
    private $fetxa_amaitu;

    /**
     * @var string
     *
     * @ORM\Column(name="erabilera", type="text", length=255, nullable=true)
     */
    private $erabilera;


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

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function __toString()
    {
        return $this->getBezeroa()->getIzena() . " - " . $this->setBizikleta();
    }

    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */

    /**
     * @var Bezeroa
     * @ORM\ManyToOne(targetEntity="Bezeroa", inversedBy="maileguak")
     */
    protected $bezeroa;

    /**
     * @var Guneak
     * @ORM\ManyToOne(targetEntity="Guneak", inversedBy="bizikletakhasi")
     */
    protected $guneahasi;

    /**
     * @var Guneak
     * @ORM\ManyToOne(targetEntity="Guneak", inversedBy="bizikletakamaitu")
     */
    protected $guneaamaitu;

    /**
     * @var Bizikleta
     * @ORM\ManyToOne(targetEntity="Bizikleta", inversedBy="maileguak")
     */
    protected $bizikleta;

    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */



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
     * Set fetxaHasi
     *
     * @param \DateTime $fetxaHasi
     *
     * @return Maileguak
     */
    public function setFetxaHasi($fetxaHasi)
    {
        $this->fetxa_hasi = $fetxaHasi;

        return $this;
    }

    /**
     * Get fetxaHasi
     *
     * @return \DateTime
     */
    public function getFetxaHasi()
    {
        return $this->fetxa_hasi;
    }

    /**
     * Set fetxaAmaitu
     *
     * @param \DateTime $fetxaAmaitu
     *
     * @return Maileguak
     */
    public function setFetxaAmaitu($fetxaAmaitu)
    {
        $this->fetxa_amaitu = $fetxaAmaitu;

        return $this;
    }

    /**
     * Get fetxaAmaitu
     *
     * @return \DateTime
     */
    public function getFetxaAmaitu()
    {
        return $this->fetxa_amaitu;
    }

    /**
     * Set erabilera
     *
     * @param string $erabilera
     *
     * @return Maileguak
     */
    public function setErabilera($erabilera)
    {
        $this->erabilera = $erabilera;

        return $this;
    }

    /**
     * Get erabilera
     *
     * @return string
     */
    public function getErabilera()
    {
        return $this->erabilera;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Maileguak
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
     * @return Maileguak
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
     * Set bezeroa
     *
     * @param \AppBundle\Entity\Bezeroa $bezeroa
     *
     * @return Maileguak
     */
    public function setBezeroa(\AppBundle\Entity\Bezeroa $bezeroa = null)
    {
        $this->bezeroa = $bezeroa;

        return $this;
    }

    /**
     * Get bezeroa
     *
     * @return \AppBundle\Entity\Bezeroa
     */
    public function getBezeroa()
    {
        return $this->bezeroa;
    }

    /**
     * Set guneahasi
     *
     * @param \AppBundle\Entity\Guneak $guneahasi
     *
     * @return Maileguak
     */
    public function setGuneahasi(\AppBundle\Entity\Guneak $guneahasi = null)
    {
        $this->guneahasi = $guneahasi;

        return $this;
    }

    /**
     * Get guneahasi
     *
     * @return \AppBundle\Entity\Guneak
     */
    public function getGuneahasi()
    {
        return $this->guneahasi;
    }

    /**
     * Set guneaamaitu
     *
     * @param \AppBundle\Entity\Guneak $guneaamaitu
     *
     * @return Maileguak
     */
    public function setGuneaamaitu(\AppBundle\Entity\Guneak $guneaamaitu = null)
    {
        $this->guneaamaitu = $guneaamaitu;

        return $this;
    }

    /**
     * Get guneaamaitu
     *
     * @return \AppBundle\Entity\Guneak
     */
    public function getGuneaamaitu()
    {
        return $this->guneaamaitu;
    }

    /**
     * Set bizikleta
     *
     * @param \AppBundle\Entity\Bizikleta $bizikleta
     *
     * @return Maileguak
     */
    public function setBizikleta(\AppBundle\Entity\Bizikleta $bizikleta = null)
    {
        $this->bizikleta = $bizikleta;

        return $this;
    }

    /**
     * Get bizikleta
     *
     * @return \AppBundle\Entity\Bizikleta
     */
    public function getBizikleta()
    {
        return $this->bizikleta;
    }
}
