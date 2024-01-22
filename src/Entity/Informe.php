<?php

namespace App\Entity;

use App\Repository\InformeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformeRepository::class)]
class Informe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dinero_recaudado = null;

    #[ORM\Column]
    private ?int $idtour = null;

    #[ORM\OneToOne(inversedBy: 'informe', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?tour $tour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDineroRecaudado(): ?string
    {
        return $this->dinero_recaudado;
    }

    public function setDineroRecaudado(string $dinero_recaudado): static
    {
        $this->dinero_recaudado = $dinero_recaudado;

        return $this;
    }

    public function getTour(): ?tour
    {
        return $this->tour;
    }

    public function setTour(tour $tour): static
    {
        $this->tour = $tour;

        return $this;
    }

}
