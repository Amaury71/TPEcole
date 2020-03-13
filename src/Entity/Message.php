<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $idExpediteur;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $idRecepteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $msg;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateEnvoie;



    public function __construct()
    {
       $this->DateEnvoie=new \DateTime();

    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdExpediteur(): ?string
    {
        return $this->idExpediteur;
    }

    public function setIdExpediteur(string $idExpediteur): self
    {
        $this->idExpediteur = $idExpediteur;

        return $this;
    }

    public function getIdRecepteur(): ?string
    {
        return $this->idRecepteur;
    }

    public function setIdRecepteur(string $idRecepteur): self
    {
        $this->idRecepteur = $idRecepteur;

        return $this;
    }

    public function getMsg(): ?string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): self
    {
        $this->msg = $msg;

        return $this;
    }

    public function getDateEnvoie(): ?\DateTimeInterface
    {
        return $this->DateEnvoie;
    }

    public function setDateEnvoie(\DateTimeInterface $DateEnvoie): self
    {
        $this->DateEnvoie = $DateEnvoie;

        return $this;
    }
}
