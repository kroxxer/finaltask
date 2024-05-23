<?php

namespace App\Entity;

use App\Repository\CollectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollectionsRepository::class)]
class Collections
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Items::class, mappedBy: 'collection', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Items $item;

    /**
     * @var Collection<int, CustomAtributes>
     */
    #[ORM\ManyToMany(targetEntity: CustomAtributes::class, mappedBy: 'collection', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $customAtributes;

    public function __construct()
    {
        $this->customAtributes = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, CustomAtributes>
     */
    public function getCustomAtributes(): Collection
    {
        return $this->customAtributes;
    }

    public function addCustomAtribute(CustomAtributes $customAtribute): static
    {
        if (!$this->customAtributes->contains($customAtribute)) {
            $this->customAtributes->add($customAtribute);
            $customAtribute->addCollection($this);
        }

        return $this;
    }

    public function removeCustomAtribute(CustomAtributes $customAtribute): static
    {
        if ($this->customAtributes->removeElement($customAtribute)) {
            $customAtribute->removeCollection($this);
        }

        return $this;
    }
}
