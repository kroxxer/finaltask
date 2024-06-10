<?php

namespace App\Entity;

use App\Repository\CustomAttributesValueRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomAttributesValueRepository::class)]
class CustomAttributesValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $custom_bool_value = null;

    #[ORM\Column(nullable: true)]
    private ?int $custom_int_value = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $custom_string_value = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $custom_text_value = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private DateTimeInterface|null $custom_date_value = null;

    #[ORM\ManyToMany(targetEntity: Items::class, mappedBy: 'collection', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $items;

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomBoolValue(): ?bool
    {
        return $this->custom_bool_value;
    }

    public function setCustomBoolValue(?bool $custom_bool_value): void
    {
        $this->custom_bool_value = $custom_bool_value;
    }

    public function getCustomIntValue(): ?int
    {
        return $this->custom_int_value;
    }

    public function setCustomIntValue(?int $custom_int_value): void
    {
        $this->custom_int_value = $custom_int_value;
    }

    public function getCustomStringValue(): ?string
    {
        return $this->custom_string_value;
    }

    public function setCustomStringValue(?string $custom_string_value): void
    {
        $this->custom_string_value = $custom_string_value;
    }

    public function getCustomTextValue(): ?string
    {
        return $this->custom_text_value;
    }

    public function setCustomTextValue(?string $custom_text_value): void
    {
        $this->custom_text_value = $custom_text_value;
    }

    public function getCustomDateValue(): ?DateTimeInterface
    {
        return $this->custom_date_value;
    }

    public function setCustomDateValue(?DateTimeInterface $custom_date_value): void
    {
        $this->custom_date_value = $custom_date_value;
    }
}
