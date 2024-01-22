<?php

namespace App\Entity;

use App\Repository\TourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TourRepository::class)]
class Tour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_hora = null;

    #[ORM\OneToOne(mappedBy: 'tour', cascade: ['persist', 'remove'])]
    private ?Informe $informe = null;

    #[ORM\ManyToOne(inversedBy: 'tour')]
    private ?Ruta $ruta = null;

    #[ORM\OneToMany(mappedBy: 'tour', targetEntity: reserva::class, orphanRemoval: true)]
    private Collection $reserva;

    #[ORM\ManyToOne(inversedBy: 'tours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    public function __construct()
    {
        $this->reserva = new ArrayCollection();
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

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fecha_hora;
    }

    public function setFechaHora(\DateTimeInterface $fecha_hora): static
    {
        $this->fecha_hora = $fecha_hora;

        return $this;
    }

    public function getInforme(): ?Informe
    {
        return $this->informe;
    }

    public function setInforme(Informe $informe): static
    {
        // set the owning side of the relation if necessary
        if ($informe->getTour() !== $this) {
            $informe->setTour($this);
        }

        $this->informe = $informe;

        return $this;
    }

    public function getRuta(): ?Ruta
    {
        return $this->ruta;
    }

    public function setRuta(?Ruta $ruta): static
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * @return Collection<int, reserva>
     */
    public function getReserva(): Collection
    {
        return $this->reserva;
    }

    public function addReserva(reserva $reserva): static
    {
        if (!$this->reserva->contains($reserva)) {
            $this->reserva->add($reserva);
            $reserva->setTour($this);
        }

        return $this;
    }

    public function removeReserva(reserva $reserva): static
    {
        if ($this->reserva->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getTour() === $this) {
                $reserva->setTour(null);
            }
        }

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }
}
