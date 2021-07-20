<?php

namespace Pricing\Entities\ProductHub;

use DateTimeInterface;

class Product
{
    private string $id;
    private string $name;
    private string $description;
    private string $sku;
    private int $categoryId;
    private float $price;
    private DateTimeInterface $createdAt;
    private DateTimeInterface $updatedAt;

    /**
     * @param string $id
     * @param string $name
     * @param string $description
     * @param string $sku
     * @param int $category_id
     * @param float $price
     * @param ?DateTimeInterface $created_at
     * @param ?DateTimeInterface $updated_at
     */
    public function __construct(
        string $id,
        string $name,
        string $description,
        string $sku,
        int $category_id,
        float $price,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->sku = $sku;
        $this->categoryId = $category_id;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'categoryId' => $this->getCategoryId(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'sku' => $this->getPrice(),
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s'),
        ];
    }

}


