<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BezeroZigorra
 *
 * @ORM\Table(name="bezero_zigorra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BezeroZigorraRepository")
 */
class BezeroZigorra
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
     * @ORM\Column(name="zigorra_hasi", type="datetime", nullable=true)
     */
    private $zigorraHasi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="zigorra_amaitu", type="datetime", nullable=true)
     */
    private $zigorraAmaitu;

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
        //return $this->getKodea();
    }


    /**
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     * ***** ERLAZIOAK
     * ************************************************************************************************************************************************************************
     * ************************************************************************************************************************************************************************
     */

    /**
     * @var Maileguak
     * @ORM\OneToOne(targetEntity="Maileguak", mappedBy="bezerozigorra")
     */
    protected $mailegua;

    /**
     * @var Bezeroa
     * @ORM\ManyToOne(targetEntity="Bezeroa", inversedBy="bezerozigorra")
     */
    protected $bezeroa;

    /**
     * @var Zigorra
     * @ORM\ManyToOne(targetEntity="Zigorra", inversedBy="bezerozigorra")
     */
    protected $zigorra;


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
     * Set zigorraHasi
     *
     * @param \DateTime $zigorraHasi
     *
     * @return BezeroZigorra
     */
    public function setZigorraHasi($zigorraHasi)
    {
        $this->zigorraHasi = $zigorraHasi;

        return $this;
    }

    /**
     * Get zigorraHasi
     *
     * @return \DateTime
     */
    public function getZigorraHasi()
    {
        return $this->zigorraHasi;
    }

    /**
     * Set zigorraAmaitu
     *
     * @param string $zigorraAmaitu
     *
     * @return BezeroZigorra
     */
    public function setZigorraAmaitu($zigorraAmaitu)
    {
        $this->zigorraAmaitu = $zigorraAmaitu;

        return $this;
    }

    /**
     * Get zigorraAmaitu
     *
     * @return string
     */
    public function getZigorraAmaitu()
    {
        return $this->zigorraAmaitu;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BezeroZigorra
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
     * @return BezeroZigorra
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
     * Set mailegua
     *
     * @param \AppBundle\Entity\Maileguak $mailegua
     *
     * @return BezeroZigorra
     */
    public function setMailegua(\AppBundle\Entity\Maileguak $mailegua = null)
    {
        $this->mailegua = $mailegua;

        return $this;
    }

    /**
     * Get mailegua
     *
     * @return \AppBundle\Entity\Maileguak
     */
    public function getMailegua()
    {
        return $this->mailegua;
    }

    /**
     * Add zigorrak
     *
     * @param \AppBundle\Entity\Zigorra $zigorrak
     *
     * @return BezeroZigorra
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
     * Get zigorrak
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZigorrak()
    {
        return $this->zigorrak;
    }

    /**
     * Set bezeroa
     *
     * @param \AppBundle\Entity\Bezeroa $bezeroa
     *
     * @return BezeroZigorra
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
     * Set zigorra
     *
     * @param \AppBundle\Entity\Zigorra $zigorra
     *
     * @return BezeroZigorra
     */
    public function setZigorra(\AppBundle\Entity\Zigorra $zigorra = null)
    {
        $this->zigorra = $zigorra;

        return $this;
    }

    /**
     * Get zigorra
     *
     * @return \AppBundle\Entity\Zigorra
     */
    public function getZigorra()
    {
        return $this->zigorra;
    }
}
