<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="barrutia", type="string", length=255, nullable=true)
     */
    private $barrutia;

    /**
     * @var string
     *
     * @ORM\Column(name="kudeatzailea", type="string", length=255)
     */
    private $kudeatzailea;

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
     * Set barrutia
     *
     * @param string $barrutia
     *
     * @return Guneak
     */
    public function setBarrutia($barrutia)
    {
        $this->barrutia = $barrutia;

        return $this;
    }

    /**
     * Get barrutia
     *
     * @return string
     */
    public function getBarrutia()
    {
        return $this->barrutia;
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
}
