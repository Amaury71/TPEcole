<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Child", mappedBy="User", orphanRemoval=true)
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="sendMsg")
     */
    private $sendMsg;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="receiveMsg")
     */
    private $receiveMsg;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CorrespondenceBook", mappedBy="nomProf", orphanRemoval=true)
     */
    private $correspondenceBooks;



    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->sendMsg = new ArrayCollection();
        $this->receiveMsg = new ArrayCollection();
        $this->correspondenceBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setUser($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getUser() === $this) {
                $child->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getLastName() ;

    }

    /**
     * @return Collection|Message[]
     */
    public function getSendMsg(): Collection
    {
        return $this->sendMsg;
    }

    public function addSendMsg(Message $sendMsg): self
    {
        if (!$this->sendMsg->contains($sendMsg)) {
            $this->sendMsg[] = $sendMsg;
            $sendMsg->setSendMsg($this);
        }

        return $this;
    }

    public function removeSendMsg(Message $sendMsg): self
    {
        if ($this->sendMsg->contains($sendMsg)) {
            $this->sendMsg->removeElement($sendMsg);
            // set the owning side to null (unless already changed)
            if ($sendMsg->getSendMsg() === $this) {
                $sendMsg->setSendMsg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getReceiveMsg(): Collection
    {
        return $this->receiveMsg;
    }

    public function addReceiveMsg(Message $receiveMsg): self
    {
        if (!$this->receiveMsg->contains($receiveMsg)) {
            $this->receiveMsg[] = $receiveMsg;
            $receiveMsg->setReceiveMsg($this);
        }

        return $this;
    }

    public function removeReceiveMsg(Message $receiveMsg): self
    {
        if ($this->receiveMsg->contains($receiveMsg)) {
            $this->receiveMsg->removeElement($receiveMsg);
            // set the owning side to null (unless already changed)
            if ($receiveMsg->getReceiveMsg() === $this) {
                $receiveMsg->setReceiveMsg(null);
            }
        }

        return $this;
    }

}
