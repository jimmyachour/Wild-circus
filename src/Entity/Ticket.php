<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="tickets")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /*************** **************/
    /*********** GETTER ***********/
    /*************** **************/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /*************** **************/
    /*********** SETTER ***********/
    /*************** **************/

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setUser(?User $user): self
    {

        $this->user = $user;

        return $this;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTicket($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeTicket($this);
        }

        return $this;
    }
}
