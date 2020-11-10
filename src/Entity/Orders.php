<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $OrderCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductId;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="text")
     */
    private $address;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ShippingDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="CompanyName")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CompanyName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderCode(): ?int
    {
        return $this->OrderCode;
    }

    public function setOrderCode(int $OrderCode): self
    {
        $this->OrderCode = $OrderCode;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->ProductId;
    }

    public function setProductId(int $ProductId): self
    {
        $this->ProductId = $ProductId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getShippingDate(): ?\DateTimeInterface
    {
        return $this->ShippingDate;
    }

    public function setShippingDate(\DateTimeInterface $ShippingDate): self
    {
        $this->ShippingDate = $ShippingDate;

        return $this;
    }
     /**
     * @return User
     */
    public function getCompanyName(): User
    {
        return $this->companyName;
    }
    /**
     * @param User $companyName
     */
    public function setCompanyName(User $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }
}
