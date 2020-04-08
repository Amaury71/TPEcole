<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sendMsg")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sendMsg;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="receiveMsg")
     */
    private $receiveMsg;

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

    public function getSendMsg(): ?User
    {
        return $this->sendMsg;
    }

    public function setSendMsg(?User $sendMsg): self
    {
        $this->sendMsg = $sendMsg;

        return $this;
    }

    public function getReceiveMsg(): ?User
    {
        return $this->receiveMsg;
    }

    public function setReceiveMsg(?User $receiveMsg): self
    {
        $this->receiveMsg = $receiveMsg;

        return $this;
    }


    public function getMsg()
    {
        return $this->msg;
    }


    public function setMsg($msg): void
    {
        $this->msg = $msg;
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
