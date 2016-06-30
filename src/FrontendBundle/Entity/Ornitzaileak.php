<?php

namespace FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ornitzaileak
 *
 * @ORM\Table(name="ornitzaileak")
 * @ORM\Entity(repositoryClass="FrontendBundle\Repository\OrnitzaileakRepository")
 */
class Ornitzaileak
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
     * @ORM\Column(name="helbidea", type="string", length=255)
     */
    private $helbidea;

    /**
     * @var string
     *
     * @ORM\Column(name="oharrak", type="text", nullable=true)
     */
    private $oharrak;


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
     * @return Ornitzaileak
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
     * @return Ornitzaileak
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
     * Set oharrak
     *
     * @param string $oharrak
     *
     * @return Ornitzaileak
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
}

