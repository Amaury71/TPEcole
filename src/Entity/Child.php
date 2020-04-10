<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
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
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="children")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAdd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validationInscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PhotoClass", inversedBy="children")
     */
    private $photoClass;



    public function __construct()
    {
        $this->dateAdd=new \DateTime();
        $this->validationInscription=false;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getValidationInscription(): ?bool
    {
        return $this->validationInscription;
    }

    public function setValidationInscription(bool $validationInscription): self
    {
        $this->validationInscription = $validationInscription;

        return $this;
    }

    public function getPhotoClass(): ?PhotoClass
    {
        return $this->photoClass;
    }

    public function setPhotoClass(?PhotoClass $photoClass): self
    {
        $this->photoClass = $photoClass;

        return $this;
    }

    public function __toString()
    {
        return $this->getFirstName() ;
    }

}
