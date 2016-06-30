<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Barrutia
 *
 * @ORM\Table(name="barrutia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BarrutiaRepository")
 */
class Barrutia
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
     * @ORM\Column(name="izena", type="string", length=255, unique=true)
     */
    private $izena;

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
     *
     * Erlazioak
     *
     */


    /**
     * @var guneak[]
     *
     * @ORM\OneToMany(targetEntity="Guneak", mappedBy="barruti", cascade={"remove"})
     */
    private $guneak;




    public function __construct()
    {
        $this->purchases = new ArrayCollection();
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
     * @return int
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
     * @return Barrutia
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Barrutia
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
     * @return Barrutia
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
     * Add guneak
     *
     * @param \AppBundle\Entity\Guneak $guneak
     *
     * @return Barrutia
     */
    public function addGuneak(\AppBundle\Entity\Guneak $guneak)
    {
        $this->guneak[] = $guneak;

        return $this;
    }

    /**
     * Remove guneak
     *
     * @param \AppBundle\Entity\Guneak $guneak
     */
    public function removeGuneak(\AppBundle\Entity\Guneak $guneak)
    {
        $this->guneak->removeElement($guneak);
    }

    /**
     * Get guneak
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuneak()
    {
        return $this->guneak;
    }
}
