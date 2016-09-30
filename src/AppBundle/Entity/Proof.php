<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proof
 *
 * @ORM\Table(name="proof")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProofRepository")
 */
class Proof
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="proofText", type="string", length=255, nullable=true)
     */
    private $proofText;

    /**
     * @var string
     *
     * @ORM\Column(name="proofImage", type="string", length=255, nullable=true)
     */
    private $proofImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;


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
     * Set title
     *
     * @param string $title
     *
     * @return Proof
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set proofText
     *
     * @param string $proofText
     *
     * @return Proof
     */
    public function setProofText($proofText)
    {
        $this->proofText = $proofText;

        return $this;
    }

    /**
     * Get proofText
     *
     * @return string
     */
    public function getProofText()
    {
        return $this->proofText;
    }

    /**
     * Set proofImage
     *
     * @param string $proofImage
     *
     * @return Proof
     */
    public function setProofImage($proofImage)
    {
        $this->proofImage = $proofImage;

        return $this;
    }

    /**
     * Get proofImage
     *
     * @return string
     */
    public function getProofImage()
    {
        return $this->proofImage;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Proof
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Proof
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}

