<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zigorra
 *
 * @ORM\Table(name="zigorra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ZigorraRepository")
 */
class Zigorra
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
     * @ORM\Column(name="izena", type="string", length=255, nullable=false, unique=true)
     */
    private $izena;

    /**
     * @var string
     *
     * @ORM\Column(name="deskribapena", type="string", length=255, nullable=true)
     */
    private $deskribapena;

    /**
     * @var string
     *
     * @ORM\Column(name="maila", type="string", length=255, nullable=true)
     */
    private $maila;

    /**
     * @var integer
     * @ORM\Column(name="egunak", type="integer", nullable=true)
     */
    private $egunak;

    /**
     * @var decimal
     * @ORM\Column(name="zenbatekoa", type="decimal", nullable=true)
     */
    private $zenbatekoa;

    /**
     * @var boolean
     * @ORM\Column(name="alokatzen_utzi", type="boolean", nullable=true)
     */
    private $alokatzen_utzi;

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
     * @var Bezeroa
     * @ORM\ManyToOne(targetEntity="Bezeroa", inversedBy="maileguak")
     */
    protected $bezeroa;

    /**
     * @var BezeroZigorra
     * @ORM\OneToMany(targetEntity="BezeroZigorra", mappedBy="zigorra", cascade={"remove"})
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
     * @return Zigorra
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
     * @return Zigorra
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
     * Set alokatzenUtzi
     *
     * @param boolean $alokatzenUtzi
     *
     * @return Zigorra
     */
    public function setAlokatzenUtzi($alokatzenUtzi)
    {
        $this->alokatzen_utzi = $alokatzenUtzi;

        return $this;
    }

    /**
     * Get alokatzenUtzi
     *
     * @return boolean
     */
    public function getAlokatzenUtzi()
    {
        return $this->alokatzen_utzi;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Zigorra
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
     * @return Zigorra
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
     * @return Zigorra
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
     * Set maila
     *
     * @param string $maila
     *
     * @return Zigorra
     */
    public function setMaila($maila)
    {
        $this->maila = $maila;

        return $this;
    }

    /**
     * Get maila
     *
     * @return string
     */
    public function getMaila()
    {
        return $this->maila;
    }

    /**
     * Set egunak
     *
     * @param integer $egunak
     *
     * @return Zigorra
     */
    public function setEgunak($egunak)
    {
        $this->egunak = $egunak;

        return $this;
    }

    /**
     * Get egunak
     *
     * @return integer
     */
    public function getEgunak()
    {
        return $this->egunak;
    }

    /**
     * Set zenbatekoa
     *
     * @param \double $zenbatekoa
     *
     * @return Zigorra
     */
    public function setZenbatekoa(\double $zenbatekoa)
    {
        $this->zenbatekoa = $zenbatekoa;

        return $this;
    }

    /**
     * Get zenbatekoa
     *
     * @return \double
     */
    public function getZenbatekoa()
    {
        return $this->zenbatekoa;
    }

    /**
     * Add bezerozigorra
     *
     * @param \AppBundle\Entity\BezeroZigorra $bezerozigorra
     *
     * @return Zigorra
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
}
