<?php

namespace App\Entity;

use App\Repository\RutaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RutaRepository::class)]
class Ruta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255)]
    private ?string $foto = null;

    #[ORM\ManyToOne(inversedBy: 'rutas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?localidad $localidad = null;

    #[ORM\ManyToMany(targetEntity: item::class, inversedBy: 'rutas')]
    private Collection $item;

    #[ORM\OneToMany(mappedBy: 'ruta', targetEntity: tour::class)]
    private Collection $tour;

    public function __construct()
    {
        $this->item = new ArrayCollection();
        $this->tour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): static
    {
        $this->foto = $foto;

        return $this;
    }

    public function getLocalidad(): ?localidad
    {
        return $this->localidad;
    }

    public function setLocalidad(?localidad $localidad): static
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return Collection<int, item>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(item $item): static
    {
        if (!$this->item->contains($item)) {
            $this->item->add($item);
        }

        return $this;
    }

    public function removeItem(item $item): static
    {
        $this->item->removeElement($item);

        return $this;
    }

    /**
     * @return Collection<int, tour>
     */
    public function getTour(): Collection
    {
        return $this->tour;
    }

    public function addTour(tour $tour): static
    {
        if (!$this->tour->contains($tour)) {
            $this->tour->add($tour);
            $tour->setRuta($this);
        }

        return $this;
    }

    public function removeTour(tour $tour): static
    {
        if ($this->tour->removeElement($tour)) {
            // set the owning side to null (unless already changed)
            if ($tour->getRuta() === $this) {
                $tour->setRuta(null);
            }
        }

        return $this;
    }
}
