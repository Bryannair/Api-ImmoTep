<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 * @Groups("post:read")
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     * @Groups("post:read")
     */
    private $describtion;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $rooms;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="properties")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescribtion(): ?string
    {
        return $this->describtion;
    }

    public function setDescribtion(string $describtion): self
    {
        $this->describtion = $describtion;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getRooms(): ?string
    {
        return $this->rooms;
    }

    public function setRooms(string $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }
}
