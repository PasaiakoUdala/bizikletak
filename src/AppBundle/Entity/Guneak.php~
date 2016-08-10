<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\Bundle\TestBundle\Controller\Bar;

/**
 * Guneak
 *
 * @ORM\Table(name="guneak")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GuneakRepository")
 */
class Guneak
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
     * @ORM\Column(name="helbidea", type="string", length=255, nullable=true)
     */
    private $helbidea;

    /**
     * @var string
     *
     * @ORM\Column(name="ordutegia", type="string", length=255, nullable=true)
     */
    private $ordutegia;

    /**
     * @var string
     *
     * @ORM\Column(name="kudeatzailea", type="string", length=255)
     */
    private $kudeatzailea;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude",type="float", nullable=true)
     */
    private $latitude;

    /**
     * @var float
     * 
     * @ORM\Column(name="longitude",type="float", nullable=true)
     */
    private $longitude;


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
     * @var Bizikleta
     * @ORM\OneToMany(targetEntity="Bizikleta", mappedBy="guneahasi", cascade={"remove"})
     */
    protected $bizikletakhasi;

    /**
     * @var Bizikleta
     * @ORM\OneToMany(targetEntity="Bizikleta", mappedBy="guneaamaitu", cascade={"remove"})
     */
    protected $bizikletakamaitu;

    /**
     * @var Bizikleta
     * @ORM\OneToMany(targetEntity="Bizikleta", mappedBy="gunea")
     */
    protected $bizikletak;


    /**
     * @var Maileguak
     * @ORM\OneToMany(targetEntity="Maileguak", mappedBy="gunea", cascade={"remove"})
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
     * @return Guneak
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
     * Set helbidea
     *
     * @param string $helbidea
     *
     * @return Guneak
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
     * Set ordutegia
     *
     * @param string $ordutegia
     *
     * @return Guneak
     */
    public function setOrdutegia($ordutegia)
    {
        $this->ordutegia = $ordutegia;

        return $this;
    }

    /**
     * Get ordutegia
     *
     * @return string
     */
    public function getOrdutegia()
    {
        return $this->ordutegia;
    }

    /**
     * Set kudeatzailea
     *
     * @param string $kudeatzailea
     *
     * @return Guneak
     */
    public function setKudeatzailea($kudeatzailea)
    {
        $this->kudeatzailea = $kudeatzailea;

        return $this;
    }

    /**
     * Get kudeatzailea
     *
     * @return string
     */
    public function getKudeatzailea()
    {
        return $this->kudeatzailea;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Guneak
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Guneak
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Guneak
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
     * @return Guneak
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
     * Set bizikletak
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletak
     *
     * @return Guneak
     */
    public function setBizikletak(\AppBundle\Entity\Bizikleta $bizikletak = null)
    {
        $this->bizikletak = $bizikletak;

        return $this;
    }

    /**
     * Get bizikletak
     *
     * @return \AppBundle\Entity\Bizikleta
     */
    public function getBizikletak()
    {
        return $this->bizikletak;
    }

    /**
     * Add bizikletak
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletak
     *
     * @return Guneak
     */
    public function addBizikletak(\AppBundle\Entity\Bizikleta $bizikletak)
    {
        $this->bizikletak[] = $bizikletak;

        return $this;
    }

    /**
     * Remove bizikletak
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletak
     */
    public function removeBizikletak(\AppBundle\Entity\Bizikleta $bizikletak)
    {
        $this->bizikletak->removeElement($bizikletak);
    }

    /**
     * Add maileguak
     *
     * @param \AppBundle\Entity\Maileguak $maileguak
     *
     * @return Guneak
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
     * Add bizikletakhasi
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletakhasi
     *
     * @return Guneak
     */
    public function addBizikletakhasi(\AppBundle\Entity\Bizikleta $bizikletakhasi)
    {
        $this->bizikletakhasi[] = $bizikletakhasi;

        return $this;
    }

    /**
     * Remove bizikletakhasi
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletakhasi
     */
    public function removeBizikletakhasi(\AppBundle\Entity\Bizikleta $bizikletakhasi)
    {
        $this->bizikletakhasi->removeElement($bizikletakhasi);
    }

    /**
     * Get bizikletakhasi
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBizikletakhasi()
    {
        return $this->bizikletakhasi;
    }

    /**
     * Add bizikletakamaitu
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletakamaitu
     *
     * @return Guneak
     */
    public function addBizikletakamaitu(\AppBundle\Entity\Bizikleta $bizikletakamaitu)
    {
        $this->bizikletakamaitu[] = $bizikletakamaitu;

        return $this;
    }

    /**
     * Remove bizikletakamaitu
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletakamaitu
     */
    public function removeBizikletakamaitu(\AppBundle\Entity\Bizikleta $bizikletakamaitu)
    {
        $this->bizikletakamaitu->removeElement($bizikletakamaitu);
    }

    /**
     * Get bizikletakamaitu
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBizikletakamaitu()
    {
        return $this->bizikletakamaitu;
    }
}
