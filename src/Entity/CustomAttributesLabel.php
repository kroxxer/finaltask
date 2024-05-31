<?php

namespace App\Entity;

use App\Repository\CustomAttributesLabelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomAttributesLabelRepository::class)]
class CustomAttributesLabel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $custom_string_state = null;

    #[ORM\Column]
    private ?bool $custom_text_state = null;

    #[ORM\Column]
    private ?bool $custom_int_state = null;

    #[ORM\Column]
    private ?bool $custom_date_state = null;

    #[ORM\Column]
    private ?bool $custom_bool_state = null;

    #[ORM\Column(nullable: true)]
    private ?bool $custom_bool_value = null;

    /**
     * @var Collection<int, Collections>
     */
    #[ORM\ManyToMany(targetEntity: Collections::class, inversedBy: 'customAtributes', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function isCustomStringState(): ?bool
    {
        return $this->custom_string_state;
    }

    public function setCustomStringState(bool $custom_string_state): static
    {
        $this->custom_string_state = $custom_string_state;

        return $this;
    }

    public function isCustomIntState(): ?bool
    {
        return $this->custom_int_state;
    }

    public function setCustomIntState(bool $custom_int_state): static
    {
        $this->custom_int_state = $custom_int_state;

        return $this;
    }

    public function isCustomDateState(): ?bool
    {
        return $this->custom_date_state;
    }

    public function setCustomDateState(bool $custom_date_state): static
    {
        $this->custom_date_state = $custom_date_state;

        return $this;
    }

    public function isCustomBoolState(): ?bool
    {
        return $this->custom_bool_state;
    }

    public function setCustomBoolState(bool $custom_bool_state): static
    {
        $this->custom_bool_state = $custom_bool_state;

        return $this;
    }

    public function getCustomTextState(): ?bool
    {
        return $this->custom_text_state;
    }

    public function setCustomTextState(?bool $custom_text_state): void
    {
        $this->custom_text_state = $custom_text_state;
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
