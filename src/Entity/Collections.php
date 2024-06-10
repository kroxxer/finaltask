<?php

namespace App\Entity;

use App\Repository\CollectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MartinGeorgiev\Doctrine\ORM\Query\AST\Functions\Arr;

#[ORM\Entity(repositoryClass: CollectionsRepository::class)]
class Collections
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Items::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $items;

    /**
     * @var Collection<int, CustomAttributesLabel>
     */
    #[ORM\ManyToMany(targetEntity: CustomAttributesLabel::class, mappedBy: 'collection', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $customAttributesLabel;

    #[ORM\ManyToOne(fetch: 'EAGER', inversedBy: 'collection')]
    #[ORM\JoinColumn(nullable: false)]
    private Category $category;

    #[ORM\Column]
    private string $owner;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'collection')]
    private Collection $tags;

    public function __construct()
    {
        $this->customAttributesLabel = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function addCustomAttributeLabel(CustomAttributesLabel $customAttributeLabel): static
    {
        if (!$this->customAttributesLabel->contains($customAttributeLabel)) {
            $this->customAttributesLabel->add($customAttributeLabel);
            $customAttributeLabel->addCollection($this);
        }

        return $this;
    }

    public function removeCustomAttributesLabel(CustomAttributesLabel $customAttributesLabel): static
    {
        if ($this->customAttributesLabel->removeElement($customAttributesLabel)) {
            $customAttributesLabel->removeCollection($this);
        }

        return $this;
    }

    public function addItems(Items $items): static
    {
        if (!$this->items->contains($items)) {
            $this->items->add($items);
            $items->addCollection($this);
        }

        return $this;
    }

    public function removeItems(Items $items): static
    {
        if ($this->items->removeElement($items)) {
            $items->removeCollection($this);
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->addCollection($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeCollection($this);
        }

        return $this;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }
}
