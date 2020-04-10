<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrespondenceBookRepository")
 */
class CorrespondenceBook
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contentMsg;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAdd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="correspondenceBooks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomProf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentMsg(): ?string
    {
        return $this->contentMsg;
    }

    public function setContentMsg(string $contentMsg): self
    {
        $this->contentMsg = $contentMsg;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    public function getNomProf(): ?user
    {
        return $this->nomProf;
    }

    public function setNomProf(?user $nomProf): self
    {
        $this->nomProf = $nomProf;

        return $this;
    }
}
