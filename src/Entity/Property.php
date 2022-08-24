<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 64)]
    private ?string $country = null;

    #[ORM\Column(length: 128)]
    private ?string $city = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'properties')]
    private Collection $media;

    #[ORM\ManyToMany(targetEntity: Feature::class, inversedBy: 'properties')]
    private Collection $feature;

    #[ORM\OneToMany(mappedBy: 'property', targetEntity: Review::class)]
    private Collection $reviews;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?PropertySpecification $property_specification = null;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->feature = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        $this->media->removeElement($medium);

        return $this;
    }

    /**
     * @return Collection<int, Feature>
     */
    public function getFeature(): Collection
    {
        return $this->feature;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->feature->contains($feature)) {
            $this->feature->add($feature);
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        $this->feature->removeElement($feature);

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProperty($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProperty() === $this) {
                $review->setProperty(null);
            }
        }

        return $this;
    }

    public function getPropertySpecification(): ?PropertySpecification
    {
        return $this->property_specification;
    }

    public function setPropertySpecification(?PropertySpecification $property_specification): self
    {
        $this->property_specification = $property_specification;

        return $this;
    }
}
