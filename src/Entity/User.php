<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      itemOperations={"get"},
 *      collectionOperations={},
 *      normalizationContext={
 *          "groups"={"read"}
 * }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $Cname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderPost", mappedBy="CompanyName")
     * @Groups({"read"})
     */
    private $posts;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="CompanyName")
     * @Groups({"read"})
     */
    Private $orders;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->Orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCname(): ?string
    {
        return $this->Cname;
    }

    public function setCname(string $Cname): self
    {
        $this->Cname = $Cname;

        return $this;
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
     * @param Doctrine\Common\Collections\Collection $user
     * @return $this
     */
    public function getOrders(Doctrine\Common\Collections\Collection $user): Colletion
    {
        return $this->Orders;

        return $this;
    }
     /**
     * @param Doctrine\Common\Collections\Collection $user
     * @return $this
     */
    public function getPosts(Doctrine\Common\Collections\Collection $user): Collection
    {
        return $this->posts;

        return $this;
    }
}
