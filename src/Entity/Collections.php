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

    private Items $item;

    #[ORM\Column]
    private bool $custom_string1_state;
    #[ORM\Column]
    private string $custom_string1_title;
    #[ORM\Column]
    private bool $custom_string2_name;

    #[ORM\Column]
    private bool $custom_string3_state;

    /**
     * @var Collection<int, CustomAtributes>
     */
    #[ORM\ManyToMany(fetch: 'EAGER', targetEntity: CustomAtributes::class, mappedBy: 'collection')]
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
