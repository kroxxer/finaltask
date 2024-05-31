<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Collections>
     */
    #[ORM\ManyToMany(targetEntity: Collections::class, inversedBy: 'tags')]
    private Collection $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Collections>
     */
    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function addCollection(Collections $collection): static
    {
        if (!$this->collection->contains($collection)) {
            $this->collection->add($collection);
        }

        return $this;
    }

    public function removeCollection(Collections $collection): static
    {
        $this->collection->removeElement($collection);

        return $this;
    }
}
