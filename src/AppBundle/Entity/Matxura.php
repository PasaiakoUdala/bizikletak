<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Bizikleta;

/**
 * Matxura
 *
 * @ORM\Table(name="matxura")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MatxuraRepository")
 */
class Matxura
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
     * @ORM\Column(name="deskribapena", type="text", nullable=true)
     */
    private $deskribapena;

    /**
     * @var string
     *
     * @ORM\Column(name="salneurria", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $salneurria;


    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */

    /**
     * @ORM\ManyToMany(targetEntity="Bizikleta", mappedBy="matxurak")
     */
    private $bizikletak;

    public function __construct()
    {
        $this->bizikletak = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getIzena();
    }

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
     * Set izena
     *
     * @param string $izena
     *
     * @return Matxura
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
     * Set deskribapena
     *
     * @param string $deskribapena
     *
     * @return Matxura
     */
    public function setDeskribapena($deskribapena)
    {
        $this->deskribapena = $deskribapena;

        return $this;
    }

    /**
     * Get deskribapena
     *
     * @return string
     */
    public function getDeskribapena()
    {
        return $this->deskribapena;
    }

    /**
     * Set salneurria
     *
     * @param string $salneurria
     *
     * @return Matxura
     */
    public function setSalneurria($salneurria)
    {
        $this->salneurria = $salneurria;

        return $this;
    }

    /**
     * Get salneurria
     *
     * @return string
     */
    public function getSalneurria()
    {
        return $this->salneurria;
    }

    /**
     * Add bizikletak
     *
     * @param \AppBundle\Entity\Bizikleta $bizikletak
     *
     * @return Matxura
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
     * Get bizikletak
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBizikletak()
    {
        return $this->bizikletak;
    }
}
