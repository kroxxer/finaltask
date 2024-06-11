<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemsRepository::class)]
class Items
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: CustomAttributesValue::class, mappedBy: 'collection', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $customAttributeValue;

    #[ORM\OneToMany(mappedBy: 'items', targetEntity: Collections::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collections $collections;

    public function __construct() {
        $this->customAttributeValue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addCustomAttributesValue(CustomAttributesValue $customAttributesValue): static
    {
        if (!$this->customAttributeValue->contains($customAttributesValue)) {
            $this->customAttributeValue->add($customAttributesValue);
        }

        return $this;
    }

    public function removeCustomAttributesValue(CustomAttributesValue $customAttributesValue): static
    {
        $this->customAttributeValue->removeElement($customAttributesValue);

        return $this;
    }
}
