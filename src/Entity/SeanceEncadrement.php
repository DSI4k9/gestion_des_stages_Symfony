<?php

namespace App\Entity;

use App\Repository\SeanceEncadrementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceEncadrementRepository::class)
 * @ORM\Table(name="seanceencadrements")
 */
class SeanceEncadrement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreSeance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $info;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreSeance(): ?int
    {
        return $this->nombreSeance;
    }

    public function setNombreSeance(int $nombreSeance): self
    {
        $this->nombreSeance = $nombreSeance;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }
}
