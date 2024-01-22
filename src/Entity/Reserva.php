<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fecha_reserva = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_participantes = null;

    #[ORM\OneToOne(mappedBy: 'reserva', cascade: ['persist', 'remove'])]
    private ?Valoraciones $valoraciones = null;

    #[ORM\ManyToOne(inversedBy: 'reserva')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tour $tour = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaReserva(): ?string
    {
        return $this->fecha_reserva;
    }

    public function setFechaReserva(string $fecha_reserva): static
    {
        $this->fecha_reserva = $fecha_reserva;

        return $this;
    }

    public function getNumeroParticipantes(): ?string
    {
        return $this->numero_participantes;
    }

    public function setNumeroParticipantes(string $numero_participantes): static
    {
        $this->numero_participantes = $numero_participantes;

        return $this;
    }

    public function getValoraciones(): ?Valoraciones
    {
        return $this->valoraciones;
    }

    public function setValoraciones(Valoraciones $valoraciones): static
    {
        // set the owning side of the relation if necessary
        if ($valoraciones->getReserva() !== $this) {
            $valoraciones->setReserva($this);
        }

        $this->valoraciones = $valoraciones;

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): static
    {
        $this->tour = $tour;

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
