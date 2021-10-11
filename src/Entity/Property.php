<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column (type="string", length=255, nullable=true)
     */
    private $image;
    /**
     * @Vich\UploadableField(mapping="property_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    private $updated;

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

    /**
     * @ORM\Column(type="integer")
     */
    private $postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $kitchen;

    /**
     * @ORM\Column(type="integer")
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $outside;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $above;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $peb;


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

    public function getPostal(): ?int
    {
        return $this->postal;
    }

    public function setPostal(int $postal): self
    {
        $this->postal = $postal;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getKitchen(): ?int
    {
        return $this->kitchen;
    }

    public function setKitchen(int $kitchen): self
    {
        $this->kitchen = $kitchen;

        return $this;
    }

    public function getGarage(): ?int
    {
        return $this->garage;
    }

    public function setGarage(int $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getOutside(): ?string
    {
        return $this->outside;
    }

    public function setOutside(string $outside): self
    {
        $this->outside = $outside;

        return $this;
    }

    public function getAbove(): ?string
    {
        return $this->above;
    }

    public function setAbove(string $above): self
    {
        $this->above = $above;

        return $this;
    }

    public function getPeb(): ?string
    {
        return $this->peb;
    }

    public function setPeb(string $peb): self
    {
        $this->peb = $peb;

        return $this;
    }

    public function setImageFile(\Symfony\Component\HttpFoundation\File\File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updated = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
}
