<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="fetxa", type="datetime")
     */
    private $fetxa;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fetxa
     *
     * @param \DateTime $fetxa
     *
     * @return Maileguak
     */
    public function setFetxa($fetxa)
    {
        $this->fetxa = $fetxa;

        return $this;
    }

    /**
     * Get fetxa
     *
     * @return \DateTime
     */
    public function getFetxa()
    {
        return $this->fetxa;
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
}

