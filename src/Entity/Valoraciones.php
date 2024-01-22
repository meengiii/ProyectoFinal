<?php

namespace App\Entity;

use App\Repository\ValoracionesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValoracionesRepository::class)]
class Valoraciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $varolacion_guia = null;

    #[ORM\Column]
    private ?int $valoracion_ruta = null;

    #[ORM\Column(length: 255)]
    private ?string $comentario = null;

    #[ORM\OneToOne(inversedBy: 'valoraciones', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?reserva $reserva = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVarolacionGuia(): ?int
    {
        return $this->varolacion_guia;
    }

    public function setVarolacionGuia(int $varolacion_guia): static
    {
        $this->varolacion_guia = $varolacion_guia;

        return $this;
    }

    public function getValoracionRuta(): ?int
    {
        return $this->valoracion_ruta;
    }

    public function setValoracionRuta(int $valoracion_ruta): static
    {
        $this->valoracion_ruta = $valoracion_ruta;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): static
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getReserva(): ?reserva
    {
        return $this->reserva;
    }

    public function setReserva(reserva $reserva): static
    {
        $this->reserva = $reserva;

        return $this;
    }
}
