<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderPostRepository::class)
 * @ApiResource(
 *      itemOperations={"get"},
 *      collectionOperations={"get"}
 * )
 */
class OrderPost
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
    private $orderCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $productId;

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
    private $shippingDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="CompanyName")
     * @ORM\JoinColumn(nullable=false)
     */
    private $companyName;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="orderPost")
     */
    Private $orders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderCode(): ?int
    {
        return $this->orderCode;
    }

    public function setOrderCode(int $orderCode): self
    {
        $this->orderCode = $orderCode;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;

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
        return $this->shippingDate;
    }

    public function setShippingDate(\DateTimeInterface $shippingDate): self
    {
        $this->shippingDate = $shippingDate;

        return $this;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    public function setCompanyId(int $companyId): self
    {
        $this->companyId = $companyId;

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
